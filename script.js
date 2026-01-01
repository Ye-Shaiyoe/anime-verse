<div class="search-container">
    <input type="text" id="anime-input" placeholder="Masukkan judul anime..." class="glass-effect px-4 py-2 rounded-full w-full">
    <button class="glass-effect text-white px-8 py-3 rounded-full font-bold hover:bg-white/10 transition flex items-center gap-2" onclick="cariAnime()">
        <span>🔍</span> Cari Judul
    </button>
</div>

<script>
function cariAnime() {
    const judul = document.getElementById('anime-input').value;
    // Gunakan API untuk mencari anime berdasarkan judul
    fetch(`https://api.jikan.moe/v4/anime?q=${judul}&limit=5`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Tampilkan hasil pencarian di halaman
        });
}
</script> 
