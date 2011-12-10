--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: advisor; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE advisor (
    s_id character varying(10) NOT NULL,
    i_id character varying(10)
);


ALTER TABLE public.advisor OWNER TO b090871cs;

--
-- Name: classroom; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE classroom (
    building character varying(20) NOT NULL,
    room_no character varying(5) NOT NULL,
    capacity character varying(5)
);


ALTER TABLE public.classroom OWNER TO b090871cs;

--
-- Name: course; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE course (
    course_id character varying(10) NOT NULL,
    dept_name character varying(10),
    credits character varying(10),
    title character varying(20)
);


ALTER TABLE public.course OWNER TO b090871cs;

--
-- Name: cr_comment; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE cr_comment (
    cid integer NOT NULL,
    pid integer,
    uid integer,
    sid integer,
    subject character varying(64),
    created integer,
    name character varying(60),
    mail character varying(64)
);


ALTER TABLE public.cr_comment OWNER TO b090871cs;

--
-- Name: cr_news_item; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE cr_news_item (
    nid integer NOT NULL,
    uid integer,
    heading character varying(255),
    body text,
    created integer
);


ALTER TABLE public.cr_news_item OWNER TO b090871cs;

--
-- Name: cr_poll; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE cr_poll (
    pollid integer NOT NULL,
    runtime integer,
    active integer
);


ALTER TABLE public.cr_poll OWNER TO b090871cs;

--
-- Name: cr_poll_choice; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE cr_poll_choice (
    chid integer NOT NULL,
    pollid integer,
    chtext character varying(128),
    chvotes integer,
    weight integer
);


ALTER TABLE public.cr_poll_choice OWNER TO b090871cs;

--
-- Name: cr_poll_vote; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE cr_poll_vote (
    chid integer,
    pollid integer NOT NULL,
    uid integer NOT NULL,
    "timestamp" integer
);


ALTER TABLE public.cr_poll_vote OWNER TO b090871cs;

--
-- Name: cr_profile; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE cr_profile (
    uid integer NOT NULL,
    fname character varying(60),
    lname character varying(60),
    gender boolean,
    mail character varying(255),
    about text,
    phone character varying(20),
    fbprofile character varying(255)
);


ALTER TABLE public.cr_profile OWNER TO b090871cs;

--
-- Name: cr_role; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE cr_role (
    rid integer NOT NULL,
    name character varying(64)
);


ALTER TABLE public.cr_role OWNER TO b090871cs;

--
-- Name: cr_role_permission; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE cr_role_permission (
    rid integer NOT NULL,
    permission character varying(128) NOT NULL
);


ALTER TABLE public.cr_role_permission OWNER TO b090871cs;

--
-- Name: cr_show; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE cr_show (
    sid integer NOT NULL,
    title character varying(255),
    ttime integer,
    duration integer,
    description text,
    file character varying(255)
);


ALTER TABLE public.cr_show OWNER TO b090871cs;

--
-- Name: cr_show_rjs; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE cr_show_rjs (
    sid integer NOT NULL,
    uid integer NOT NULL
);


ALTER TABLE public.cr_show_rjs OWNER TO b090871cs;

--
-- Name: cr_user; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE cr_user (
    uid integer NOT NULL,
    name character varying(60),
    pass character varying(128),
    mail character varying(64),
    created integer,
    access integer
);


ALTER TABLE public.cr_user OWNER TO b090871cs;

--
-- Name: cr_user_roles; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE cr_user_roles (
    uid integer NOT NULL,
    rid integer NOT NULL
);


ALTER TABLE public.cr_user_roles OWNER TO b090871cs;

--
-- Name: department; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE department (
    dept_name character varying(20) NOT NULL,
    building character varying(10),
    budget character varying(10),
    budget1 integer
);


ALTER TABLE public.department OWNER TO b090871cs;

--
-- Name: instructor; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE instructor (
    id character varying(10) NOT NULL,
    name character varying(10),
    dept_name character varying(10),
    salary character varying(10),
    salary1 integer
);


ALTER TABLE public.instructor OWNER TO b090871cs;

--
-- Name: prereq; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE prereq (
    course_id character varying(10) NOT NULL,
    prereq_id character varying(10) NOT NULL
);


ALTER TABLE public.prereq OWNER TO b090871cs;

--
-- Name: section; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE section (
    course_id character varying(10) NOT NULL,
    sec_id character varying(1) NOT NULL,
    semester character varying(10) NOT NULL,
    year character varying(10) NOT NULL,
    building character varying(20),
    room_no character varying(10),
    time_slot_id character varying(5)
);


ALTER TABLE public.section OWNER TO b090871cs;

--
-- Name: student; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE student (
    id character varying(10) NOT NULL,
    name character varying(20),
    dept_name character varying(10),
    tot_cred character varying(10)
);


ALTER TABLE public.student OWNER TO b090871cs;

--
-- Name: takes; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE takes (
    id character varying(10) NOT NULL,
    course_id character varying(10) NOT NULL,
    sec_id character varying(5) NOT NULL,
    semester character varying(10) NOT NULL,
    year character varying(10) NOT NULL,
    grade character varying(10)
);


ALTER TABLE public.takes OWNER TO b090871cs;

--
-- Name: teaches; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE teaches (
    id character varying(10) NOT NULL,
    course_id character varying(10) NOT NULL,
    sec_id character varying(1) NOT NULL,
    semester character varying(10) NOT NULL,
    year character varying(10) NOT NULL
);


ALTER TABLE public.teaches OWNER TO b090871cs;

--
-- Name: time_slot; Type: TABLE; Schema: public; Owner: b090871cs; Tablespace: 
--

CREATE TABLE time_slot (
    time_slot_id character varying(5) NOT NULL,
    day character varying(5) NOT NULL,
    start_time character varying(5),
    end_time character varying(5)
);


ALTER TABLE public.time_slot OWNER TO b090871cs;

--
-- Data for Name: advisor; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY advisor (s_id, i_id) FROM stdin;
00128	45565
12345	10101
23121	76543
44553	22222
45678	22222
76543	45565
76653	98345
98765	98345
98988	76766
\.


--
-- Data for Name: classroom; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY classroom (building, room_no, capacity) FROM stdin;
Packard	101	500
Painter	514	10
Taylor	3128	70
Watson	100	30
Watson	120	50
\.


--
-- Data for Name: course; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY course (course_id, dept_name, credits, title) FROM stdin;
BIO-301	Biology	4	Genetics
BIO-101	Biology	4	Intro. to Biology
BIO-399	Biology	3	Computational Bio
CS-101	Comp. Sci.	4	Intro.Com Science
CS-190	Comp. Sci.	4	Game Design
CS-315	Comp. Sci.	3	Robotics
CS-319	Comp. Sci.	3	Image Processing
CS-347	Comp. Sci.	3	Database Concepts
EE-181	Elec. Eng.	3	Digital Systems
FIN-201	Finance	3	Investment Banking
HIS-351	History	3	World History
MU-199	Music	3	Music Video Prod
PHY-101	Physics	4	Physical Principles
\.


--
-- Data for Name: cr_comment; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY cr_comment (cid, pid, uid, sid, subject, created, name, mail) FROM stdin;
\.


--
-- Data for Name: cr_news_item; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY cr_news_item (nid, uid, heading, body, created) FROM stdin;
\.


--
-- Data for Name: cr_poll; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY cr_poll (pollid, runtime, active) FROM stdin;
\.


--
-- Data for Name: cr_poll_choice; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY cr_poll_choice (chid, pollid, chtext, chvotes, weight) FROM stdin;
\.


--
-- Data for Name: cr_poll_vote; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY cr_poll_vote (chid, pollid, uid, "timestamp") FROM stdin;
\.


--
-- Data for Name: cr_profile; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY cr_profile (uid, fname, lname, gender, mail, about, phone, fbprofile) FROM stdin;
\.


--
-- Data for Name: cr_role; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY cr_role (rid, name) FROM stdin;
\.


--
-- Data for Name: cr_role_permission; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY cr_role_permission (rid, permission) FROM stdin;
\.


--
-- Data for Name: cr_show; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY cr_show (sid, title, ttime, duration, description, file) FROM stdin;
\.


--
-- Data for Name: cr_show_rjs; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY cr_show_rjs (sid, uid) FROM stdin;
\.


--
-- Data for Name: cr_user; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY cr_user (uid, name, pass, mail, created, access) FROM stdin;
\.


--
-- Data for Name: cr_user_roles; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY cr_user_roles (uid, rid) FROM stdin;
\.


--
-- Data for Name: department; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY department (dept_name, building, budget, budget1) FROM stdin;
Biology	Watson	90000	90000
Finance	Painter	120000	120000
History	Painter	50000	50000
Music	Packard	80000	80000
Physics	Watson	70000	70000
Elec. Eng.	Taylor	85000	85000
Comp. Sci.	Taylor	100000	100000
\.


--
-- Data for Name: instructor; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY instructor (id, name, dept_name, salary, salary1) FROM stdin;
10101	Srinivasan	Comp. Sci.	65000	65000
12121	Wu	Finance	90000	90000
15151	Mozart	Music	40000	40000
22222	Einstein	Physics	95000	95000
32343	El Said	History	60000	60000
33456	Gold	Physics	87000	87000
45565	Katz	Comp. Sci.	75000	75000
58583	Califieri	History	62000	62000
76543	Singh	Finance	80000	80000
83821	Brandt	Comp. Sci.	92000	92000
98345	Kim	Elec. Eng.	80000	80000
76766	Crick	Biology	72000	72000
\.


--
-- Data for Name: prereq; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY prereq (course_id, prereq_id) FROM stdin;
BIO-301	BIO-101
BIO-399	BIO-101
CS-190	CS-101
CS-315	CS-101
CS-319	CS-101
CS-347	CS-101
EE-181	PHY-101
\.


--
-- Data for Name: section; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY section (course_id, sec_id, semester, year, building, room_no, time_slot_id) FROM stdin;
BIO-101	1	Summer	2009	Painter	514	B
BIO-301	1	Summer	2010	Painter	514	A
CS-101	1	Fall	2009	Packard	101	H
CS-101	1	Spring	2010	Packard	101	F
CS-190	1	Spring	2009	Taylor	3128	E
CS-190	2	Spring	2009	Taylor	3128	A
CS-315	1	Spring	2010	Watson	120	D
CS-319	1	Spring	2010	Watson	100	B
CS-319	2	Spring	2010	Taylor	3128	C
CS-347	1	Fall	2009	Taylor	3128	A
EE-181	1	Spring	2009	Taylor	3128	C
FIN-201	1	Spring	2010	Packard	101	B
HIS-351	1	Spring	2010	Painter	514	C
MU-199	1	Spring	2010	Packard	101	D
PHY-101	1	Fall	2009	Watson	100	A
CS-101	1	Summer	2010	Packard	101	F
CS-101	1	Fall	2010	Packard	101	F
\.


--
-- Data for Name: student; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY student (id, name, dept_name, tot_cred) FROM stdin;
00128	Zhang	Comp. Sci.	102
12345	Shankar	Comp. Sci.	32
19991	Brandt	History	80
23121	Chavez	Finance	110
44553	Peltier	Physics	56
45678	Levy	Physics	46
54321	Williams	Comp. Sci.	54
55739	Sanchez	Music	38
70557	Snow	Physics	0
76543	Brown	Comp. Sci.	58
76653	Aoi	Elec. Eng.	60
98765	Bourikas	Elec. Eng.	98
98988	Tanaka	Biology	120
\.


--
-- Data for Name: takes; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY takes (id, course_id, sec_id, semester, year, grade) FROM stdin;
00128	CS-101	1	Fall	2009	A
00128	CS-347	1	Fall	2009	A-
12345	CS-101	1	Fall	2009	C
12345	CS-190	2	Spring	2009	A
12345	CS-315	1	Spring	2010	A
12345	CS-347	1	Fall	2009	A
19991	HIS-351	1	Spring	2010	B
23121	FIN-201	1	Spring	2010	C+
44553	PHY-101	1	Fall	2009	B-
45678	CS-101	1	Fall	2009	F
45678	CS-101	1	Spring	2010	B+
45678	CS-319	1	Spring	2010	B
54321	CS-101	1	Fall	2009	A-
54321	CS-190	2	Spring	2009	B+
55739	MU-199	1	Spring	2010	A-
76543	CS-101	1	Fall	2009	A
76543	CS-319	2	Spring	2010	A
76653	EE-181	1	Spring	2009	C
98765	CS-101	1	Fall	2009	C-
98765	CS-315	1	Spring	2010	B
98988	BIO-101	1	Summer	2009	A
98988	BIO-301	1	Summer	2010	\N
\.


--
-- Data for Name: teaches; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY teaches (id, course_id, sec_id, semester, year) FROM stdin;
10101	CS-101	1	Fall	2009
10101	CS-315	1	Spring	2010
10101	CS-347	1	Fall	2009
12121	FIN-201	1	Spring	2010
15151	MU-199	1	Spring	2010
22222	PHY-101	1	Fall	2009
32343	HIS-351	1	Spring	2010
45565	CS-101	1	Spring	2010
45565	CS-319	1	Spring	2010
76766	BIO-101	1	Summer	2009
76766	BIO-301	1	Summer	2010
83821	CS-190	1	Spring	2009
83821	CS-190	2	Spring	2009
83821	CS-319	2	Spring	2010
98345	EE-181	1	Spring	2009
\.


--
-- Data for Name: time_slot; Type: TABLE DATA; Schema: public; Owner: b090871cs
--

COPY time_slot (time_slot_id, day, start_time, end_time) FROM stdin;
A	M	0800	0850
A	W	0800	0850
A	F	0800	0850
B	M	0900	0950
B	W	0090	0950
B	F	0900	0950
C	M	1100	1150
C	W	1100	1150
C	F	1100	1150
D	M	1300	1350
D	W	1300	1350
D	F	1300	1350
E	T	1030	1145 
E	R	1030	1145 
F	T	1430	1545 
F	R	1430	1545 
G	M	1600	1650
G	W	1600	1650
G	F	1600	1650
H	W	1000	1230
\.


--
-- Name: advisor_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY advisor
    ADD CONSTRAINT advisor_pkey PRIMARY KEY (s_id);


--
-- Name: classroom_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY classroom
    ADD CONSTRAINT classroom_pkey PRIMARY KEY (building, room_no);


--
-- Name: course_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY course
    ADD CONSTRAINT course_pkey PRIMARY KEY (course_id);


--
-- Name: cr_comment_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY cr_comment
    ADD CONSTRAINT cr_comment_pkey PRIMARY KEY (cid);


--
-- Name: cr_news_item_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY cr_news_item
    ADD CONSTRAINT cr_news_item_pkey PRIMARY KEY (nid);


--
-- Name: cr_poll_choice_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY cr_poll_choice
    ADD CONSTRAINT cr_poll_choice_pkey PRIMARY KEY (chid);


--
-- Name: cr_poll_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY cr_poll
    ADD CONSTRAINT cr_poll_pkey PRIMARY KEY (pollid);


--
-- Name: cr_poll_vote_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY cr_poll_vote
    ADD CONSTRAINT cr_poll_vote_pkey PRIMARY KEY (pollid, uid);


--
-- Name: cr_profile_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY cr_profile
    ADD CONSTRAINT cr_profile_pkey PRIMARY KEY (uid);


--
-- Name: cr_role_permission_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY cr_role_permission
    ADD CONSTRAINT cr_role_permission_pkey PRIMARY KEY (rid, permission);


--
-- Name: cr_role_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY cr_role
    ADD CONSTRAINT cr_role_pkey PRIMARY KEY (rid);


--
-- Name: cr_show_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY cr_show
    ADD CONSTRAINT cr_show_pkey PRIMARY KEY (sid);


--
-- Name: cr_show_rjs_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY cr_show_rjs
    ADD CONSTRAINT cr_show_rjs_pkey PRIMARY KEY (sid, uid);


--
-- Name: cr_user_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY cr_user
    ADD CONSTRAINT cr_user_pkey PRIMARY KEY (uid);


--
-- Name: cr_user_roles_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY cr_user_roles
    ADD CONSTRAINT cr_user_roles_pkey PRIMARY KEY (uid, rid);


--
-- Name: department_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY department
    ADD CONSTRAINT department_pkey PRIMARY KEY (dept_name);


--
-- Name: instructor_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY instructor
    ADD CONSTRAINT instructor_pkey PRIMARY KEY (id);


--
-- Name: prereq_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY prereq
    ADD CONSTRAINT prereq_pkey PRIMARY KEY (course_id, prereq_id);


--
-- Name: section_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY section
    ADD CONSTRAINT section_pkey PRIMARY KEY (sec_id, semester, year, course_id);


--
-- Name: student_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY student
    ADD CONSTRAINT student_pkey PRIMARY KEY (id);


--
-- Name: takes_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY takes
    ADD CONSTRAINT takes_pkey PRIMARY KEY (id, course_id, sec_id, semester, year);


--
-- Name: teaches_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY teaches
    ADD CONSTRAINT teaches_pkey PRIMARY KEY (id, course_id, sec_id, semester, year);


--
-- Name: time_slot_pkey; Type: CONSTRAINT; Schema: public; Owner: b090871cs; Tablespace: 
--

ALTER TABLE ONLY time_slot
    ADD CONSTRAINT time_slot_pkey PRIMARY KEY (time_slot_id, day);


--
-- Name: advisor_i_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY advisor
    ADD CONSTRAINT advisor_i_id_fkey FOREIGN KEY (i_id) REFERENCES instructor(id);


--
-- Name: advisor_s_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY advisor
    ADD CONSTRAINT advisor_s_id_fkey FOREIGN KEY (s_id) REFERENCES student(id);


--
-- Name: course_dept_name_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY course
    ADD CONSTRAINT course_dept_name_fkey FOREIGN KEY (dept_name) REFERENCES department(dept_name);


--
-- Name: cr_comment_sid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY cr_comment
    ADD CONSTRAINT cr_comment_sid_fkey FOREIGN KEY (sid) REFERENCES cr_show(sid);


--
-- Name: cr_comment_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY cr_comment
    ADD CONSTRAINT cr_comment_uid_fkey FOREIGN KEY (uid) REFERENCES cr_user(uid);


--
-- Name: cr_news_item_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY cr_news_item
    ADD CONSTRAINT cr_news_item_uid_fkey FOREIGN KEY (uid) REFERENCES cr_user(uid);


--
-- Name: cr_poll_choice_pollid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY cr_poll_choice
    ADD CONSTRAINT cr_poll_choice_pollid_fkey FOREIGN KEY (pollid) REFERENCES cr_poll(pollid);


--
-- Name: cr_poll_vote_chid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY cr_poll_vote
    ADD CONSTRAINT cr_poll_vote_chid_fkey FOREIGN KEY (chid) REFERENCES cr_poll_choice(chid);


--
-- Name: cr_poll_vote_pollid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY cr_poll_vote
    ADD CONSTRAINT cr_poll_vote_pollid_fkey FOREIGN KEY (pollid) REFERENCES cr_poll(pollid);


--
-- Name: cr_poll_vote_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY cr_poll_vote
    ADD CONSTRAINT cr_poll_vote_uid_fkey FOREIGN KEY (uid) REFERENCES cr_user(uid);


--
-- Name: cr_profile_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY cr_profile
    ADD CONSTRAINT cr_profile_uid_fkey FOREIGN KEY (uid) REFERENCES cr_user(uid);


--
-- Name: cr_role_permission_rid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY cr_role_permission
    ADD CONSTRAINT cr_role_permission_rid_fkey FOREIGN KEY (rid) REFERENCES cr_role(rid);


--
-- Name: cr_show_rjs_sid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY cr_show_rjs
    ADD CONSTRAINT cr_show_rjs_sid_fkey FOREIGN KEY (sid) REFERENCES cr_show(sid);


--
-- Name: cr_show_rjs_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY cr_show_rjs
    ADD CONSTRAINT cr_show_rjs_uid_fkey FOREIGN KEY (uid) REFERENCES cr_user(uid);


--
-- Name: cr_user_roles_rid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY cr_user_roles
    ADD CONSTRAINT cr_user_roles_rid_fkey FOREIGN KEY (rid) REFERENCES cr_role(rid);


--
-- Name: cr_user_roles_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY cr_user_roles
    ADD CONSTRAINT cr_user_roles_uid_fkey FOREIGN KEY (uid) REFERENCES cr_user(uid);


--
-- Name: instructor_dept_name_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY instructor
    ADD CONSTRAINT instructor_dept_name_fkey FOREIGN KEY (dept_name) REFERENCES department(dept_name);


--
-- Name: prereq_course_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY prereq
    ADD CONSTRAINT prereq_course_id_fkey FOREIGN KEY (course_id) REFERENCES course(course_id);


--
-- Name: prereq_prereq_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY prereq
    ADD CONSTRAINT prereq_prereq_id_fkey FOREIGN KEY (prereq_id) REFERENCES course(course_id);


--
-- Name: section_building_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY section
    ADD CONSTRAINT section_building_fkey FOREIGN KEY (building, room_no) REFERENCES classroom(building, room_no);


--
-- Name: section_course_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY section
    ADD CONSTRAINT section_course_id_fkey FOREIGN KEY (course_id) REFERENCES course(course_id);


--
-- Name: student_dept_name_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY student
    ADD CONSTRAINT student_dept_name_fkey FOREIGN KEY (dept_name) REFERENCES department(dept_name);


--
-- Name: takes_course_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY takes
    ADD CONSTRAINT takes_course_id_fkey FOREIGN KEY (course_id, sec_id, semester, year) REFERENCES section(course_id, sec_id, semester, year);


--
-- Name: takes_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY takes
    ADD CONSTRAINT takes_id_fkey FOREIGN KEY (id) REFERENCES student(id);


--
-- Name: teaches_course_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY teaches
    ADD CONSTRAINT teaches_course_id_fkey FOREIGN KEY (course_id, sec_id, semester, year) REFERENCES section(course_id, sec_id, semester, year);


--
-- Name: teaches_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: b090871cs
--

ALTER TABLE ONLY teaches
    ADD CONSTRAINT teaches_id_fkey FOREIGN KEY (id) REFERENCES instructor(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

