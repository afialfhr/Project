<?php
//upload gambar untuk produk
function UploadImage($fupload_name)
{
	//direktori gambar
	$vdir_upload="../fotoproduk/";
	$vfile_upload=$vdir_upload.$fupload_name;

	//simpan gambar ukuran asli
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

	//identitas file asli
	$im_src=imagecreatefromjpeg($vfile_upload);
	$src_width=imagesx($im_src);
	$src_height=imagesy($im_src);

	//simpan gambar ukuran 110 pixel
	//set ukuran gambar hasil konversi
	$dst_width=110;
	$dst_height=($dst_width/$src_width)*$src_height;

	//proses konversi ukuran
	$im=imagecreatetruecolor($dst_width, $dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

	//simpan gambar
	imagejpeg($im,$vdir_upload."small_".$fupload_name);

	//simpan gambar ukuran 360 pixel
	//set ukuran gambar hasil konversi
	$dst_width=233;
	$dst_height=288;

	//proses konversi ukuran
	$im2=imagecreatetruecolor($dst_width2, $dst_height2);
	imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width2, $src_height2);

	//simpan gambar
	imagejpeg($im2,$vdir_upload."medium_".$fupload_name);

	//hapus gambar cache
	imagedestroy($im_src);
	imagedestroy($im);
	imagedestroy($im2);
}
?>