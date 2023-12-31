CREATE DATABASE graduation





CREATE TABLE `user` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `email` VARCHAR(99) NOT NULL UNIQUE ,
    `password` VARCHAR(99) NOT NULL ,
    `name` VARCHAR(99) NOT NULL , 
    `phone` VARCHAR(99) NOT NULL ,
    `role` VARCHAR(20) NOT NULL ,
    `blocked` BOOLEAN NULL DEFAULT NULL ,
    `blocked_reason` TEXT NULL DEFAULT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `student` ( 
    `fn` INT NOT NULL , 
    `user_id` INT NOT NULL , 
    `degree` VARCHAR(99) NOT NULL , 
    `major` VARCHAR(99) NOT NULL , 
    `group` INT NOT NULL , 
    PRIMARY KEY (`fn`) 
) ENGINE = InnoDB;

ALTER TABLE `student` ADD INDEX(`user_id`);
ALTER TABLE `student` ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

CREATE TABLE `student_diploma` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `student_fn` INT NOT NULL , 
    `attendance` BOOLEAN NOT NULL DEFAULT 0 , 
    `grade` DOUBLE NULL DEFAULT NULL , 
    `has_right` BOOLEAN NOT NULL DEFAULT 1 , 
    `is_ready` BOOLEAN NOT NULL DEFAULT 0 , 
    `is_taken` BOOLEAN NOT NULL DEFAULT 0 ,
    `take_in_advance_request` BOOLEAN NOT NULL DEFAULT 0 , 
    `take_in_advance_request_comment` TEXT NULL DEFAULT NULL ,
    `is_taken_in_advance` BOOLEAN NOT NULL DEFAULT 0 , 
    `taken_at_time` DATETIME NULL DEFAULT NULL , 
    `diploma_comment` TEXT NULL DEFAULT NULL , 
    `speech_request` BOOLEAN NOT NULL DEFAULT 0 , 
    `speech_response` VARCHAR(99) NULL DEFAULT NULL, 
    `photos_requested` BOOLEAN NOT NULL DEFAULT 0 , 
	`student_alumni` BOOLEAN NULL DEFAULT 0 , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `student_diploma` ADD INDEX(`student_fn`);
ALTER TABLE `student_diploma` ADD CONSTRAINT `student_fn_fk` FOREIGN KEY (`student_fn`) REFERENCES `student`(`fn`) ON DELETE CASCADE ON UPDATE RESTRICT;

CREATE TABLE `student_grown` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `student_fn` INT NOT NULL , 
    `grown_requested` BOOLEAN NULL DEFAULT NULL , 
    `grown_taken` BOOLEAN NULL DEFAULT 0 , 
    `grown_taken_date` VARCHAR(99) NULL DEFAULT NULL , 
    `grown_returned` BOOLEAN NULL DEFAULT 0 , 
    `grown_returned_date` DATE NULL DEFAULT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `student_grown` ADD INDEX(`student_fn`);
ALTER TABLE `student_grown` ADD CONSTRAINT `student_fn_fk_3` FOREIGN KEY (`student_fn`) REFERENCES `student`(`fn`) ON DELETE CASCADE ON UPDATE RESTRICT;

CREATE TABLE `student_hat` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `student_fn` INT NOT NULL , 
    `hat_requested` BOOLEAN NULL DEFAULT NULL , 
    `hat_taken` BOOLEAN NULL DEFAULT 0 , 
    `hat_taken_date` VARCHAR(99) NULL DEFAULT NULL , 
    `hat_returned` BOOLEAN NULL DEFAULT 0 , 
    `hat_returned_date` DATE NULL DEFAULT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `student_hat` ADD INDEX(`student_fn`);
ALTER TABLE `student_hat` ADD CONSTRAINT `student_fn_fk_4` FOREIGN KEY (`student_fn`) REFERENCES `student`(`fn`) ON DELETE CASCADE ON UPDATE RESTRICT;

CREATE TABLE `diploma_order` ( 
    `id` INT NOT NULL , 
    `param_1` VARCHAR(99) NOT NULL , 
    `param_2` VARCHAR(99) NULL DEFAULT NULL , 
    `param_3` VARCHAR(99) NULL DEFAULT NULL , 
    `param_4` VARCHAR(99) NULL DEFAULT NULL , 
    `param_5` VARCHAR(99) NULL DEFAULT NULL , 
    `param_6` VARCHAR(99) NULL DEFAULT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `graduation_time` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `start_time` TIME NULL DEFAULT NULL , 
    `students_interval` TIME NULL DEFAULT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `graduation_colors` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `color_interval` INT(100) NOT NULL , 
    `color1` VARCHAR(99) NULL DEFAULT NULL , 
    `color2` VARCHAR(99) NULL DEFAULT NULL , 
    `color3` VARCHAR(99) NULL DEFAULT NULL , 
    `color4` VARCHAR(99) NULL DEFAULT NULL , 
    `color5` VARCHAR(99) NULL DEFAULT NULL , 
    `color6` VARCHAR(99) NULL DEFAULT NULL , 
    `color7` VARCHAR(99) NULL DEFAULT NULL , 
    `color8` VARCHAR(99) NULL DEFAULT NULL , 
    `color9` VARCHAR(99) NULL DEFAULT NULL , 
    `color10` VARCHAR(99) NULL DEFAULT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
























