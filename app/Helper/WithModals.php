<?php

namespace App\Helper;

trait WithModals
{

    public function openModal($id)
    {
        $this->dispatchBrowserEvent('onModalOpen', ['name' => '#' . $id]);
    }

    public function closeModal($id)
    {
        $this->dispatchBrowserEvent('onModalClose', ['name' => '#' . $id]);
    }

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent('confirmDelete', ['id' => $id]);
    }
}
