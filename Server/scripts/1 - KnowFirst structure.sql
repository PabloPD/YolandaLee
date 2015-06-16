-- ======================================================
-- Author:  	 Aitor Garrido & Pablo Parras
-- Database:  knowfirst
-- Description:  Create all knowfirst database structure
-- ======================================================

/* Create database */
DROP DATABASE IF EXISTS knowfirst;
CREATE DATABASE IF NOT EXISTS knowfirst;
USE knowfirst;

/* Table kf_user */
CREATE TABLE kf_user (
	user_PK INT PRIMARY KEY auto_increment,
    user_email VARCHAR(255) UNIQUE,
    user_password VARCHAR(255),
    user_dob DATETIME,
    user_role TINYINT(4)
)ENGINE=InnoDB;

/* Table kf_uploads */
CREATE TABLE kf_uploads(
	upl_PK INT PRIMARY KEY auto_increment,
    upl_filename VARCHAR(255),
    upl_date DATETIME
)ENGINE=InnoDB;

/* Table kf_userprofile */
CREATE TABLE kf_userprofile (
	upr_PK INT PRIMARY KEY auto_increment,
    upr_name VARCHAR(255),
    upr_gender ENUM('male','female'),
    upr_lookfor ENUM('male','female'),
    upr_location VARCHAR(255),
    upr_color VARCHAR(255),
    upr_FK_upl_PK INT,
    upr_FK_user_PK INT,
    FOREIGN KEY (upr_FK_upl_PK) REFERENCES kf_uploads(upl_PK),
    FOREIGN KEY (upr_FK_user_PK) REFERENCES kf_user(user_PK)
)ENGINE=InnoDB;

/* Table kf_userfeature */
CREATE TABLE kf_userfeature (
	uft_PK INT PRIMARY KEY auto_increment,
    uft_name VARCHAR(255)
)ENGINE=InnoDB;

/* Table kf_userprofilefeature */
CREATE TABLE kf_userprofilefeature (
	upf_FK_upr_PK INT,
    upf_FK_uft_PK INT,
    PRIMARY KEY (upf_FK_upr_PK,upf_FK_uft_PK),
    FOREIGN KEY (upf_FK_upr_PK) REFERENCES kf_userprofile(upr_PK),
    FOREIGN KEY (upf_FK_uft_PK) REFERENCES kf_userfeature(uft_PK)
)ENGINE=InnoDB;

/* Table kf_userprofilepictures */
CREATE TABLE kf_userprofilepictures (
	upp_FK_upr_PK INT,
    upp_FK_upl_PK INT,
    PRIMARY KEY (upp_FK_upr_PK,upp_FK_upl_PK),
    FOREIGN KEY (upp_FK_upr_PK) REFERENCES kf_userprofile(upr_PK),
    FOREIGN KEY (upp_FK_upl_PK) REFERENCES kf_uploads(upl_PK)
)ENGINE=InnoDB;

/* Table kf_game */
CREATE TABLE kf_game (
	game_PK INT PRIMARY KEY auto_increment,
    game_FK_upr_PK_1 INT,
    game_FK_upr_PK_2 INT,
    game_step INT,
    game_winner TINYINT(4),
    game_visible BOOLEAN,
    game_lastUpdate DATETIME,
    FOREIGN KEY (game_FK_upr_PK_1) REFERENCES kf_userprofile(upr_PK),
    FOREIGN KEY (game_FK_upr_PK_2) REFERENCES kf_userprofile(upr_PK)
    )ENGINE=InnoDB;
    
/* Table kf_question1theme */
CREATE TABLE kf_question1theme (
	q1t_PK INT PRIMARY KEY auto_increment,
    q1t_theme VARCHAR(255)
)ENGINE=InnoDB;

/* Table kf_question1 */
CREATE TABLE kf_question1 (
	qu1_PK INT PRIMARY KEY auto_increment,
    qu1_question VARCHAR(255),
    qu1_answer VARCHAR(255),
    qu1_failanswer1 VARCHAR(255),
    qu1_failanswer2 VARCHAR(255),
    qu1_FK_q1t_PK INT,
    FOREIGN KEY (qu1_FK_q1t_PK) REFERENCES kf_question1theme(q1t_PK)
)ENGINE=InnoDB;

/* Table kf_gamequestions1 */
CREATE TABLE kf_gamequestions1 (
	gq1_PK INT PRIMARY KEY auto_increment,
    gq1_FK_qu1_PK INT,
    gq1_FK_game_PK INT,
    gq1_FK_upr_PK INT,
    gq1_resolved BOOLEAN,
    FOREIGN KEY (gq1_FK_qu1_PK) REFERENCES kf_question1(qu1_PK),
    FOREIGN KEY (gq1_FK_game_PK) REFERENCES kf_game(game_PK),
    FOREIGN KEY (gq1_FK_upr_PK) REFERENCES kf_userprofile(upr_PK)
)ENGINE=InnoDB;

/* Table kf_question2theme */
CREATE TABLE kf_question2theme (
	q2t_PK INT PRIMARY KEY auto_increment,
    q2t_theme VARCHAR(255)
)ENGINE=InnoDB;

/* Table kf_question2 */
CREATE TABLE kf_question2 (
	qu2_PK INT PRIMARY KEY auto_increment,
    qu2_question VARCHAR(255),
    qu2_FK_q2t_PK INT,
    FOREIGN KEY (qu2_FK_q2t_PK) REFERENCES kf_question2theme(q2t_PK)
)ENGINE=InnoDB;

/* Table kf_gamequestions2 */
CREATE TABLE kf_gamequestions2 (
	gq2_PK INT PRIMARY KEY auto_increment,
    gq2_FK_qu2_PK INT,
    gq2_FK_game_PK INT,
    gq2_answer TEXT,
    FOREIGN KEY (gq2_FK_qu2_PK) REFERENCES kf_question2(qu2_PK),
    FOREIGN KEY (gq2_FK_game_PK) REFERENCES kf_game(game_PK)
)ENGINE=InnoDB;