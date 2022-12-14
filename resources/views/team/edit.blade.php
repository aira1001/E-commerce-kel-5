<x-template>
    <div class="content">
        <h3>{{ $pra_kasus->judul_kasus }}</h3>
        <div class="container-fluid">
            <form method="POST" action="{{ route('team.update', ['pra_kasus' => $pra_kasus->id_pra_kasus ]) }}">
                @csrf

                <select name="pegawai[]" id="tom-select" multiple class="mb-2" required>
                    <option value="">Pilih Anggota</option>
                    @foreach ($anggota as $pegawai)
                    @foreach ($team as $id)
                    @if ($id == $pegawai->id)
                    <option value="{{ $pegawai->id }}" selected>{{ $pegawai->nama }}</option>
                    @else
                    <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                    @endif
                    @endforeach
                    @endforeach
                </select>
                <button class="btn btn-primary">Perbarui Tim</button>
            </form>
        </div>
    </div>
    <script>
        var settings = {};
        new TomSelect('#tom-select',settings);
    </script>
</x-template>
