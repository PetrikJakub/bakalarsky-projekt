<x-jet-action-section>
    <x-slot name="title">
        {{ __('Vymazať účet') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Natrvalo vymazať účet.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Po odstránení vášho účtu budú natrvalo odstránené všetky jeho zdroje a údaje. Pred odstránením svojho účtu si stiahnite všetky údaje alebo informácie, ktoré si chcete ponechať.') }}
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Vymazať účet') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Vymazať účet') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Naozaj chcete odstrániť svoj účet? Po odstránení vášho účtu budú natrvalo odstránené všetky jeho zdroje a údaje. Zadajte svoje heslo na potvrdenie, že chcete natrvalo odstrániť svoj účet.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                placeholder="{{ __('Password') }}"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="deleteUser" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Zrušiť') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Vymazať účet') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
