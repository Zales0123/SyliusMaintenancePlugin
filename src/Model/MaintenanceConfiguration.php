<?php

declare(strict_types=1);

namespace Synolia\SyliusMaintenancePlugin\Model;

class MaintenanceConfiguration
{
    private string $ipAddresses = '';

    private bool $enabled = true;

    private string $customMessage = '';

    private ?\DateTimeInterface $startDate;

    private ?\DateTimeInterface $endDate;

    public function getIpAddresses(): string
    {
        return $this->ipAddresses;
    }

    public function setIpAddresses(?string $ipAddresses): self
    {
        if (null === $ipAddresses) {
            return $this;
        }
        $this->ipAddresses = $ipAddresses;

        return $this;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getCustomMessage(): string
    {
        return $this->customMessage;
    }

    public function setCustomMessage(?string $customMessage): self
    {
        if (null === $customMessage) {
            return $this;
        }
        $this->customMessage = $customMessage;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function map(?array $dataFromMaintenanceYaml): self
    {
        $self = new self();

        if (null === $dataFromMaintenanceYaml) {
            return $self;
        }
        if (array_key_exists('ips', $dataFromMaintenanceYaml)) {
            $self->setIpAddresses(implode(',', $dataFromMaintenanceYaml['ips']));
        }
        $self->setEnabled(true);

        return $self;
    }
}
