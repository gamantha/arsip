INSERT INTO `arsip` (`id`, `no_surat`, `tanggal_simpan`, `perusahaan_id`, `divisi_id`, `tema`, `jabatan_id`, `penyimpanan_id`) VALUES
(10, '1', '2015-12-12', 1, 1, 'pengen rapat aja', 1, 1),
(12, '2', '2015-12-12', 2, 1, 'das', 1, 1),
(13, '10', '2015-12-12', 1, 1, 'pengen rapat aja', 1, 1),
(14, 'a21', '2015-12-09', 1, 1, 'surat cinta', 1, 1);

INSERT INTO `divisi` (`divisi_id`, `nama_divisi`) VALUES
(1, 'perencanaan');

INSERT INTO `jabatan` (`jabatan_id`, `nama_jabatan`) VALUES
(1, 'manager');

INSERT INTO `penyimpanan` (`penyimpanan_id`, `tempat_penyimpanan`) VALUES
(1, 'laci1');

INSERT INTO `perusahaan` (`perusahaan_id`, `nama_perusahaan`) VALUES
(1, 'MSU'),
(2, 'SIG'),
(3, 'Gamantha');

INSERT INTO `tema` (`tema_id`, `tema`) VALUES
(1, 'Rapat kornas');

INSERT INTO `user` (`id`, `username`, `email`, `auth_key`, `password_hash`, `password_reset_token`, `role_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'reno', 'renowijoyo@gmail.com', '4XFGCO7IRlrb9wZuPcSrvWo8bt9H6Yra', '$2y$13$LFS3EIwRyS9vyc3CY7QLnOEBmc5YVmcwCeaDC3GTds63xTIrt0TzG', NULL, 1, 1442506740, 1442506740, '10'),
(2, 'rizki', 'rizki@gmail.com', '7RYZIpXilZwhK8bqFgp5K0yYfHypzWND', '$2y$13$kztNvx0vD0UIclTSMR5/1ONZZChb2V2nwVmkHY.uHdB5HXOn.ZEU.', NULL, 1, 1444883061, 1444883061, '10'),
(3, 'anis', 'anis@gmaill.com', 'WHogQVYFvrjtZ0UzEZ_2NYQ1R5VmMAL8', '$2y$13$jWRPiDGm76uk79hnYAy0QOKZTSulHATgjg27xHuWcpbrB2Ay/auNC', NULL, NULL, 1450062566, 1450062566, '10');