<footer class="text-center py-3 bg-white shadow-sm" @if(Auth::user() && auth()->user()->role!='pasien') style="padding-left:300px !important;"@endif>
    <hr>
    <div class="containter">
        <p>&copy; {{ date('Y') }} Sistem Informasi RS. All rights reserved.</p>
    </div>
</footer>