<?php
session_start();

// Hapus semua data session
session_destroy();

// Mengarahkan pengguna ke halaman login atau halaman lain yang sesuai
echo "<script>alert('Logout Berhasil');
window.location.href='../index.html';
</script>";
exit;
