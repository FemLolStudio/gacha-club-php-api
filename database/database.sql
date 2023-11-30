SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

CREATE TABLE `oc` (
  `accountx` char(7) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `mycode` text COMPRESSED NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPRESSED;

CREATE TABLE `transfer` (
  `accountx` int(10) UNSIGNED NOT NULL,
    `data` longtext COMPRESSED NOT NULL CHECK (json_valid(`data`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPRESSED;

ALTER TABLE `oc`
  ADD PRIMARY KEY (`accountx`);

ALTER TABLE `transfer`
  ADD PRIMARY KEY (`accountx`);
COMMIT;