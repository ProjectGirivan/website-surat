{{-- <li class="breadcrumb-item active"><a href="{{url('/sesi/logout')}}">Logout</a></li> --}}

<li class="breadcrumb-item active"><a href="#" onclick="confirmLogout()">Logout</a></li>

<script>
    function confirmLogout() {
        if (confirm('Apakah Anda yakin ingin logout?')) {
            window.location.href = '{{ url('/sesi/logout') }}';
        }
    }
</script>
