SET FOREIGN_KEY_CHECKS=0;

ALTER TABLE `tblizinpendaftaran`
ADD COLUMN `tblizinpendaftaran_idlama`  bigint(20) UNSIGNED NULL DEFAULT 0 AFTER `tblizinpendaftaran_id`;