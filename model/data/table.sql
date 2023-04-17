CREATE TABLE USER
(
    ID         INTEGER      NOT NULL AUTO_INCREMENT,
    FIRSTNAME  VARCHAR(255) NOT NULL,
    LASTNAME   VARCHAR(255) NOT NULL,
    EMAIL      VARCHAR(255) NULL,
    NIVEAU     INTEGER      NULL,
    USERNAME   VARCHAR(255) NOT NULL,
    PASSWORD   VARCHAR(255) NOT NULL,
    ROLE       VARCHAR(255) NOT NULL,
    CREATED_AT DATETIME     NOT NULL,
    PRIMARY KEY (ID)
);
CREATE TABLE COURSE
(
    ID          INTEGER       NOT NULL AUTO_INCREMENT,
    NAME        VARCHAR(255)  NOT NULL,
    AUTHOR_ID   INTEGER       NOT NULL,
    NIVEAU      INTEGER       NULL,
    DESCRIPTION VARCHAR(1000) NOT NULL,
    CREATED_AT  DATETIME      NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (AUTHOR_ID) REFERENCES USER (ID) ON DELETE CASCADE
);
CREATE TABLE TEST
(
    ID         INTEGER      NOT NULL AUTO_INCREMENT,
    NAME       VARCHAR(255) NOT NULL,
    COURSE_ID  INTEGER      NOT NULL,
    CREATED_AT DATETIME     NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (COURSE_ID) REFERENCES COURSE (ID) ON DELETE CASCADE
);
CREATE TABLE FOLLOWED_COURSE
(
    ID        INTEGER NOT NULL AUTO_INCREMENT,
    USER_ID   INTEGER NOT NULL,
    COURSE_ID INTEGER NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (USER_ID) REFERENCES USER (ID) ON DELETE CASCADE,
    FOREIGN KEY (COURSE_ID) REFERENCES COURSE (ID) ON DELETE CASCADE
);
CREATE TABLE FORUM_DISCUSSION
(
    ID         INTEGER      NOT NULL AUTO_INCREMENT,
    USER_ID    INTEGER      NOT NULL,
    COURSE_ID  INTEGER      NOT NULL,
    TITLE      VARCHAR(255) NOT NULL,
    CREATED_AT DATETIME     NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (USER_ID) REFERENCES USER (ID) ON DELETE CASCADE,
    FOREIGN KEY (COURSE_ID) REFERENCES COURSE (ID) ON DELETE CASCADE
);
CREATE TABLE FORUM_MESSAGE
(
    ID            INTEGER      NOT NULL AUTO_INCREMENT,
    USER_ID       INTEGER      NOT NULL,
    DISCUSSION_ID INTEGER      NOT NULL,
    CONTENT       VARCHAR(256) NOT NULL,
    CREATED_AT    DATETIME     NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (USER_ID) REFERENCES USER (ID) ON DELETE CASCADE,
    FOREIGN KEY (DISCUSSION_ID) REFERENCES FORUM_DISCUSSION (ID) ON DELETE CASCADE
);
create table TEST_USER
(
    id      INTEGER       not null primary key auto_increment,
    id_test INTEGER       not null references TEST (ID) ON DELETE CASCADE,
    id_user INTEGER       not null references USER (ID) ON DELETE CASCADE,
    score   decimal(5, 2) not null
);
insert into USER(firstname, lastname, username, password, role, created_at)
values ('charles', 'charles', 'charles', sha2('toor', 256), 'student', sysdate());
insert into USER(firstname, lastname, username, password, role, created_at)
values ('charles', 'charles', 'charle', sha2('toor', 256), 'student', sysdate());
insert into USER(firstname, lastname, username, password, role, created_at)
values ('ciccio', 'ciccio', 'ciccio', sha2('toor', 256), '3', sysdate());
insert into USER(firstname, lastname, username, password, role, created_at)
values ('charles', 'charles', 'CharleT', sha2('toor', 256), 'teacher', sysdate());

INSERT INTO `COURSE` (`ID`, `NAME`, `AUTHOR_ID`, `DESCRIPTION`, `CREATED_AT`)
VALUES (1, 'php', 1, 'dsfsdfsdf', '2023-04-03 09:34:50'),
       (2, 'phpInit', 1, 'dsfsdfsdf', '2023-04-03 09:35:05'),
       (3, 'phpInit', 1, 'dsfsdfsdf', '2023-04-03 09:43:20'),
       (4, 'phpInit', 1, 'dsfsdfsdf', '2023-04-03 09:44:02'),
       (5, 'phpInit', 1, 'dsfsdfsdf', '2023-04-03 09:45:20'),
       (6, 'phpInit', 4, 'dsfsdfsdf', '2023-04-03 09:47:06'),
       (7, 'phpInit', 4, 'dsfsdfsdf', '2023-04-04 10:36:39'),
       (8, 'HTML', 4, 'kjfhkefhlzfcbkfjevclzjhlck', '2023-04-04 14:04:36'),
       (9, 'HTML', 4, 'kjfhkefhlzfcbkfjevclzjhlck', '2023-04-04 14:05:36'),
       (10, 'HTML', 4, 'kjfhkefhlzfcbkfjevclzjhlck', '2023-04-11 15:05:18');