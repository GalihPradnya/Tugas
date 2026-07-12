
    <main class="container mx-auto py-12 px-4 flex-1">
        <h2 class="text-3xl font-bold mb-2 text-green-700 text-center">Kontak Desa</h2>
        <p class="text-gray-500 mb-8 text-center text-base">Hubungi kami untuk informasi, layanan, atau keperluan administrasi desa.</p>
        <div class="md:flex md:space-x-8 items-stretch">
            <div class="md:w-1/2 flex flex-col gap-6">
                <div class="bg-white rounded shadow p-6 flex-1">
                    <h3 class="text-2xl font-bold mb-2">Informasi Kontak</h3>
                    <p class="mb-1">Alamat: Jl. Raya Desa No. 1, Kecamatan [X], Kabupaten [Y]</p>
                    <p class="mb-1">Telepon: 08xx-xxxx-xxxx</p>
                    <p class="mb-1">Email: desa@email.com</p>
                </div>
                <div class="bg-white rounded shadow p-6 flex-1">
                    <h3 class="text-2xl font-bold mb-2">Lokasi Desa</h3>
                    <iframe src="https://maps.google.com/maps?q=-7.250445,112.768845&z=15&output=embed" width="100%" height="220" class="rounded shadow" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="md:w-1/2 flex flex-col justify-stretch">
                <div class="bg-white rounded shadow p-6 h-full flex flex-col">
                    <h3 class="text-2xl font-bold mb-2">Formulir Kontak</h3>
                    <form class="flex-1 flex flex-col justify-between">
                        <div class="mb-4">
                            <label class="block mb-1 font-medium" for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" class="w-full border border-green-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-1 font-medium" for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Masukkan email Anda" class="w-full border border-green-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-1 font-medium" for="pesan">Pesan</label>
                            <textarea id="pesan" name="pesan" rows="4" placeholder="Tulis pesan Anda di sini" class="w-full border border-green-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" required></textarea>
                        </div>
                        <button type="submit" class="bg-green-700 text-white px-6 py-2 rounded font-semibold shadow hover:bg-green-800 transition">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    