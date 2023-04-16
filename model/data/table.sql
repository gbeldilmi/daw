CREATE TABLE USER (
                      ID INT NOT NULL AUTO_INCREMENT,
                      FIRSTNAME VARCHAR(255) NOT NULL,
                      LASTNAME VARCHAR(255) NOT NULL,
                      EMAIL VARCHAR(255) NULL,
                      NIVEAU INT NULL ,
                      USERNAME VARCHAR(255) NOT NULL,
                      PASSWORD VARCHAR(255) NOT NULL,
                      ROLE VARCHAR(255) NOT NULL,
                      CREATED_AT DATETIME NOT NULL,
                      PRIMARY KEY (ID)
);
CREATE TABLE COURSE (
                        ID INT NOT NULL AUTO_INCREMENT,
                        NAME VARCHAR(255) NOT NULL,
                        AUTHOR_ID INT NOT NULL,
                        DESCRIPTION VARCHAR(1000) NOT NULL,
                        CREATED_AT DATETIME NOT NULL,
                        PRIMARY KEY (ID),
                        FOREIGN KEY (AUTHOR_ID) REFERENCES USER(ID)
);
CREATE TABLE TEST (
                      ID INT NOT NULL AUTO_INCREMENT,
                      NAME VARCHAR(255) NOT NULL,
                      COURSE_ID INT NOT NULL,
                      CREATED_AT DATETIME NOT NULL,
                      PRIMARY KEY (ID),
                      FOREIGN KEY (COURSE_ID) REFERENCES COURSE(ID)
);
CREATE TABLE FOLLOWED_COURSE (
                                 ID INT NOT NULL AUTO_INCREMENT,
                                 USER_ID INT NOT NULL,
                                 COURSE_ID INT NOT NULL,
                                 PRIMARY KEY (ID),
                                 FOREIGN KEY (USER_ID) REFERENCES USER(ID),
                                 FOREIGN KEY (COURSE_ID) REFERENCES COURSE(ID)
);
CREATE TABLE FORUM_DISCUSSION (
                                  ID INT NOT NULL AUTO_INCREMENT,
                                  USER_ID INT NOT NULL,
                                  COURSE_ID INT NOT NULL,
                                  TITLE VARCHAR(255) NOT NULL,
                                  CREATED_AT DATETIME NOT NULL,
                                  PRIMARY KEY (ID),
                                  FOREIGN KEY (USER_ID) REFERENCES USER(ID),
                                  FOREIGN KEY (COURSE_ID) REFERENCES COURSE(ID)
);
CREATE TABLE FORUM_MESSAGE (
                               ID INT NOT NULL AUTO_INCREMENT,
                               USER_ID INT NOT NULL,
                               DISCUSSION_ID INT NOT NULL,
                               CONTENT VARCHAR(256) NOT NULL,
                               CREATED_AT DATETIME NOT NULL,
                               PRIMARY KEY (ID),
                               FOREIGN KEY (USER_ID) REFERENCES USER(ID),
                               FOREIGN KEY (DISCUSSION_ID) REFERENCES FORUM_DISCUSSION(ID)
);
create table TEST_USER(
                          id integer not null primary key auto_increment,
                          id_test integer not null references TEST(ID),
                          id_user integer not null references USER(ID),
                          score decimal(5,2) not null
);
insert into USER(firstname, lastname,username,password, role, created_at)
values('charles','charles','charles',sha2('toor',256),'student',sysdate());
insert into USER(firstname, lastname,username,password, role, created_at)
values('charles','charles','charle',sha2('toor',256),'student',sysdate());
insert into USER(firstname, lastname,username,password, role, created_at)
values('ciccio','ciccio','ciccio',sha2('toor',256),'3',sysdate());
insert into USER(firstname, lastname,username,password, role, created_at)
values('charles','charles','CharleT',sha2('toor',256),'teacher',sysdate());

INSERT INTO `COURSE` (`ID`, `NAME`, `AUTHOR_ID`, `DESCRIPTION`, `CREATED_AT`) VALUES
(1, 'php', 1, 'dsfsdfsdf', '2023-04-03 09:34:50'),
(2, 'phpInit', 1, 'dsfsdfsdf', '2023-04-03 09:35:05'),
(3, 'phpInit', 1, 'dsfsdfsdf', '2023-04-03 09:43:20'),
(4, 'phpInit', 1, 'dsfsdfsdf', '2023-04-03 09:44:02'),
(5, 'phpInit', 1, 'dsfsdfsdf', '2023-04-03 09:45:20'),
(6, 'phpInit', 4, 'dsfsdfsdf', '2023-04-03 09:47:06'),
(7, 'phpInit', 4, 'dsfsdfsdf', '2023-04-04 10:36:39'),
(8, 'HTML', 4, 'kjfhkefhlzfcbkfjevclzjhlck', '2023-04-04 14:04:36'),
(9, 'HTML', 4, 'kjfhkefhlzfcbkfjevclzjhlck', '2023-04-04 14:05:36'),
(10, 'HTML', 4, 'kjfhkefhlzfcbkfjevclzjhlck', '2023-04-11 15:05:18');