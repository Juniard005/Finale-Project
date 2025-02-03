<div x-data="{ showUpload: false}">
    <x-filament::breadcrumbs :breadcrumbs="[
    '/admin/gurus' => 'Guru Atau Pengajar',
    '' => 'List',
    ]" />
    <div class="flex justify-between mt-1">
        <div class="font-bold text-3xl">Guru</div>
        <div>
            {{ $data }}
        </div>
    </div>

    <button
    @click="showUpload = !showUpload"
    class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4">
    Unggah Berkas
    </button>

    <div x-show="showUpload" class="mt-5">
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
