### **Nama : Muhammad Fadhil Zurani** 
### **NIM : 122140146** 
### **Kelas : Pemrograman Web RA** 

---

#### **Link Hosting Website : [backburner.ct.ws](http://backburner.ct.ws/)**  

---

### **Bagian 1: Client-side Programming (30%)**

#### **1.1 Manipulasi DOM dengan JavaScript (15%)**

Kode berikut menggunakan JavaScript untuk memanipulasi DOM, seperti menampilkan data dalam tabel dan validasi input.

```javascript
document.addEventListener("DOMContentLoaded", function () {
  const stateInput = document.getElementById("stateInput");
  const cookieDisplay = document.getElementById("cookieDisplay");

  // Set Cookie
  document
    .getElementById("setCookieBtn")
    .addEventListener("click", function () {
      const value = stateInput.value;
      document.cookie = `valorantCookie=${value}; path=/; max-age=3600`; // Berlaku selama 1 jam
      alert("Cookie disimpan!");
    });

  // Update UI untuk cookie
  const cookies = document.cookie.split("; ").reduce((acc, cookie) => {
    const [key, value] = cookie.split("=");
    acc[key] = value;
    return acc;
  }, {});
  cookieDisplay.textContent = cookies.valorantCookie || "Belum ada nilai";
});
```

**Penjelasan:**

- Form input memungkinkan pengguna menyimpan data dalam cookie.
- Cookie disimpan dan dimanipulasi dengan `document.cookie`.

#### **1.2 Event Handling (15%)**

Kode berikut menangani berbagai event di form:

```javascript
document.addEventListener("DOMContentLoaded", function () {
  const emailInput = document.getElementById("email");
  const submitButton = document.querySelector("button[type='submit']");

  emailInput.addEventListener("input", function () {
    if (!emailInput.value.includes("@")) {
      submitButton.disabled = true;
      alert("Email tidak valid!");
    } else {
      submitButton.disabled = false;
    }
  });
});
```

**Penjelasan:**

- Event `input` pada email memvalidasi format email secara real-time.
- Tombol submit diaktifkan/dinonaktifkan sesuai validasi.

---

### **Bagian 2: Server-side Programming (30%)**

#### **2.1 Pengelolaan Data dengan PHP (20%)**

```php
session_start();
include '../config/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    echo "Data berhasil disimpan.";
}
```

**Penjelasan:**

- Data dari form diterima dengan metode POST.
- Data divalidasi, diproses, dan disimpan ke database menggunakan prepared statement.

#### **2.2 Objek PHP Berbasis OOP (10%)**

```php
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function findByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function verifyPassword($inputPassword, $storedHash)
    {
        return password_verify($inputPassword, $storedHash);
    }
}
```

**Penjelasan:**

- Kelas `User` menggunakan OOP untuk mencari data pengguna berdasarkan email.
- Memanfaatkan metode seperti `findByEmail`.

---

### **Bagian 3: Database Management (20%)**

#### **3.1 Pembuatan Tabel Database (5%)**

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    password VARCHAR(255)
);
```

**Penjelasan:**  
Tabel `users` dibuat dengan kolom ID, nama, dan password.

#### **3.2 Konfigurasi Koneksi Database (5%)**

```php
$conn = new mysqli("localhost", "root", "", "uas_web");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
```

**Penjelasan:**

- File `db_config.php` mengatur koneksi ke database.

---

### **Bagian 4: State Management (20%)**

#### **4.1 State Management dengan Session (10%)**

```php
session_start();
$_SESSION['user_name'] = $user['name'];
$_SESSION['is_logged_in'] = true;
```

**Penjelasan:**

- Data pengguna seperti nama dan status login disimpan ke dalam sesi.

#### **4.2 Pengelolaan State dengan Cookie dan Browser Storage (10%)**

```javascript
  document.addEventListener("DOMContentLoaded", () => {
        // Referensi elemen DOM
        const cookieInput = document.getElementById("cookieInput");
        const localStorageInput = document.getElementById("localStorageInput");
        const sessionStorageInput = document.getElementById(
          "sessionStorageInput"
        );

        const cookieDisplay = document.getElementById("cookieDisplay");
        const localStorageDisplay = document.getElementById(
          "localStorageDisplay"
        );
        const sessionStorageDisplay = document.getElementById(
          "sessionStorageDisplay"
        );

        // Fungsi untuk memperbarui tampilan nilai
        function updateDisplays() {
          // Tampilkan Cookie
          const cookies = document.cookie.split("; ").reduce((acc, cookie) => {
            const [key, value] = cookie.split("=");
            acc[key] = value;
            return acc;
          }, {});
          cookieDisplay.textContent =
            cookies.valorantCookie || "Belum ada nilai";

          // Tampilkan LocalStorage
          localStorageDisplay.textContent =
            localStorage.getItem("valorantLocalStorage") || "Belum ada nilai";

          // Tampilkan SessionStorage
          sessionStorageDisplay.textContent =
            sessionStorage.getItem("valorantSessionStorage") ||
            "Belum ada nilai";
        }

        // Fungsi untuk Cookie
        document.getElementById("setCookie").addEventListener("click", () => {
          const value = cookieInput.value.trim();
          if (!value) {
            alert("Masukkan nilai terlebih dahulu!");
            return;
          }
          document.cookie = `valorantCookie=${value}; path=/; max-age=3600`; // Berlaku 1 jam
          updateDisplays();
        });

        document.getElementById("deleteCookie").addEventListener("click", () => {
            document.cookie = "valorantCookie=; path=/; max-age=0"; // Hapus cookie
            updateDisplays();
          });

        // Fungsi untuk LocalStorage
        document.getElementById("setLocalStorage").addEventListener("click", () => {
            const value = localStorageInput.value.trim();
            if (!value) {
              alert("Masukkan nilai terlebih dahulu!");
              return;
            }
            localStorage.setItem("valorantLocalStorage", value);
            updateDisplays();
          });

        document
          .getElementById("deleteLocalStorage")
          .addEventListener("click", () => {
            localStorage.removeItem("valorantLocalStorage");
            updateDisplays();
          });

        // Fungsi untuk SessionStorage
        document
          .getElementById("setSessionStorage")
          .addEventListener("click", () => {
            const value = sessionStorageInput.value.trim();
            if (!value) {
              alert("Masukkan nilai terlebih dahulu!");
              return;
            }
            sessionStorage.setItem("valorantSessionStorage", value);
            updateDisplays();
          });

        document
          .getElementById("deleteSessionStorage")
          .addEventListener("click", () => {
            sessionStorage.removeItem("valorantSessionStorage");
            updateDisplays();
          });

        // Inisialisasi tampilan
        updateDisplays();
      });
```

**Penjelasan:**

- Menggunakan `setCookie` dan `deleteCookie` untuk menyimpan dan menghapus cookies di browser pengguna 
- Menggunakan `setLocalStorage` dan `deleteLocalStorage` untuk menyimpan dan menghapus cookies di browser pengguna 
- Menggunakan `setSessionStorage` dan `deleteSessionStorage` untuk menyimpan dan menghapus cookies di browser pengguna 

![bukti-cookies](/assets/bukti-cookies.png)

Diatas adalah kondisi saat cookies diset tetapi tidak muncul di layar, karena kemungkinan dari hosting `InfiniteFree` nya membatasi untuk merender cookiesnya, tetapi saat di jalankan di local cookiesnya muncul

![bukti-cookies](/assets/bukti-cookies2.png)

---

### Bagian Bonus: Hosting Aplikasi Web Menggunakan **InfinityFree**

#### **1. Langkah-langkah untuk Meng-host Aplikasi Web Anda**

Berikut langkah-langkah yang dilakukan untuk meng-host aplikasi web pada platform **InfinityFree**:

1. **Pendaftaran Akun**
   - Mendaftar di [InfinityFree](https://www.infinityfree.net/) dengan menggunakan email yang valid.
2. **Pembuatan Akun Hosting**

   - Buat akun hosting baru di dashboard dengan nama domain gratis atau domain kustom Anda.
   - Jika menggunakan domain kustom, arahkan DNS ke nameserver InfinityFree.

3. **Upload File Aplikasi**
   - Gunakan **File Manager** bawaan InfinityFree atau aplikasi FTP (seperti FileZilla) untuk mengunggah file aplikasi Anda ke direktori `htdocs`.
4. **Konfigurasi Database**

   - Buat database melalui **Control Panel** InfinityFree.
   - Perbarui file konfigurasi koneksi database Anda (`db_config.php`) dengan kredensial database dari InfinityFree.

5. **Testing**
   - Akses domain Anda melalui browser untuk memastikan aplikasi berjalan dengan baik.

---

#### **2. Penyedia Hosting yang Paling Cocok**

**InfinityFree** dipilih karena:

- **Gratis**: Tidak ada biaya untuk hosting, dengan batasan yang cukup memadai untuk proyek kecil atau menengah.
- **Mendukung PHP dan MySQL**: Cocok untuk aplikasi berbasis PHP seperti proyek ini.
- **Unlimited Bandwidth**: Membantu memastikan aplikasi tetap dapat diakses oleh pengguna tanpa batasan lalu lintas.

---

#### **3. Cara Memastikan Keamanan Aplikasi Web**

Berikut adalah langkah-langkah keamanan yang diterapkan:

1. **HTTPS**:
   - Menggunakan sertifikat SSL gratis yang disediakan oleh InfinityFree untuk mengamankan komunikasi antara server dan pengguna.
2. **Validasi Input**:
   - Semua data dari pengguna divalidasi dan disanitasi baik di sisi klien maupun server untuk mencegah serangan seperti SQL Injection dan XSS.
3. **Session Management**:
   - Menggunakan sesi untuk mengelola autentikasi pengguna, memastikan data tidak disimpan dalam cookie tanpa enkripsi.
4. **Keamanan Database**:
   - Password disimpan dalam bentuk hash menggunakan `password_hash()` dan ada password jika ingin mengakses database.

---

#### **4. Konfigurasi Server**

Konfigurasi yang diterapkan untuk mendukung aplikasi di **InfinityFree** mencakup pengaturan koneksi database dan pengaturan server.

1. **Pengaturan Database Connection**
   Saat menggunakan **InfinityFree**, informasi koneksi database disesuaikan dengan detail yang diberikan oleh InfinityFree, seperti:

   ```php
   $servername = "sesuaikan di InfinityFree"; // Contoh: sql123.infinityfree.com
   $username = "sesuaikan di InfinityFree";  // Contoh: epiz_12345678
   $password = "sesuaikan di InfinityFree";  // Sesuai dengan password akun Anda
   $dbname = "sesuaikan di InfinityFree";    // Contoh: epiz_12345678_uas_web
   ```

   Contoh kode lengkap pada file `db_config.php`:

   ```php
   <?php
   $servername = "sesuaikan di InfinityFree"; // Ganti dengan host database dari InfinityFree
   $username = "sesuaikan di InfinityFree";  // Ganti dengan username database Anda
   $password = "sesuaikan di InfinityFree";  // Ganti dengan password database Anda
   $dbname = "sesuaikan di InfinityFree";    // Ganti dengan nama database Anda

   $conn = new mysqli($servername, $username, $password, $dbname);

   // Periksa koneksi
   if ($conn->connect_error) {
       die("Koneksi gagal: " . $conn->connect_error);
   }
   ?>
   ```
