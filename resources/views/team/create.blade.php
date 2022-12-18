<x-template>
    <div class="content">
        <h3>{{ $pra_kasus->judul_kasus }}</h3>
        <div class="container-fluid">
            {{-- <form method="POST" action="{{ route('team.store', ['pra_kasus' => $pra_kasus->id_pra_kasus ]) }}"> --}}
                <form method="POST" action="{{ route('team.store', ['pra_kasus' => $pra_kasus->id_pra_kasus ]) }}">
                @csrf

                <select name="pegawai[]" id="tom-select" multiple class="mb-2" required>
                    <option value="">Pilih Anggota</option>
                    @foreach ($anggota as $pegawai)
                    <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary">Bentuk Tim</button>
            </form>
        </div>
    </div>
    <script>
        var settings = {};
        new TomSelect('#tom-select',settings);
    </script>
</x-template>
