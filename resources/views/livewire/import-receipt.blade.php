<div>
    <form wire:submit="create">
        <div class="form-group">

            {{ $this->form }}
        </div>


        <button type="submit" class="btn btn-primary">
            Xác nhận
        </button>
    </form>

    <x-filament-actions::modals/>
</div>
