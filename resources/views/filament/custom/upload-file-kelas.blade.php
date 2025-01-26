<div>
    <x-filament::breadcrumbs :breadcrumbs="[
    '/admin/kelas' => 'Kelas',
    '' => 'List',
    ]" />
    <div class="flex justify-between mt-1">
        <div class="font-bold text-3xl">Kelas</div>
        <div>
            {{ $data }}
        </div>
    </div>
    <div>
        <form wire:submit="save" class="w-full max-w-sm flex mt-2">
            <div class="mb-4">
                <label for="fileinput" class="block text-gray-700 text-sm font-bold-mb-2">
                    Pilih Berkas
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                    leanding-tight focus:outline-none focus:shadow-outline"
                    id="fileinput" type="file" wire:model="file">
            </div>
            <div class="flex items-center justify-between mt-3">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded
                    focus:outline-none focus:shadow-outline"
                    type="submit">
                    Unggah
                </button>
            </div>
        </form>
    </div>
</div>
