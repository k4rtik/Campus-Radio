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
-- Name: comment; Type: TABLE; Schema: public; Owner: crdbuser; Tablespace: 
--

CREATE TABLE comment (
    cid integer NOT NULL,
    pid integer,
    uid integer,
    sid integer,
    subject character varying(64),
    created integer,
    name character varying(60),
    mail character varying(64)
);


ALTER TABLE public.comment OWNER TO crdbuser;

--
-- Name: news_item; Type: TABLE; Schema: public; Owner: crdbuser; Tablespace: 
--

CREATE TABLE news_item (
    nid integer NOT NULL,
    uid integer,
    heading character varying(255),
    body text,
    created integer
);


ALTER TABLE public.news_item OWNER TO crdbuser;

--
-- Name: poll; Type: TABLE; Schema: public; Owner: crdbuser; Tablespace: 
--

CREATE TABLE poll (
    pollid integer NOT NULL,
    runtime integer,
    active integer
);


ALTER TABLE public.poll OWNER TO crdbuser;

--
-- Name: poll_choice; Type: TABLE; Schema: public; Owner: crdbuser; Tablespace: 
--

CREATE TABLE poll_choice (
    chid integer NOT NULL,
    pollid integer,
    chtext character varying(128),
    chvotes integer,
    weight integer
);


ALTER TABLE public.poll_choice OWNER TO crdbuser;

--
-- Name: poll_vote; Type: TABLE; Schema: public; Owner: crdbuser; Tablespace: 
--

CREATE TABLE poll_vote (
    chid integer,
    pollid integer NOT NULL,
    uid integer NOT NULL,
    "timestamp" integer
);


ALTER TABLE public.poll_vote OWNER TO crdbuser;

--
-- Name: profile; Type: TABLE; Schema: public; Owner: crdbuser; Tablespace: 
--

CREATE TABLE profile (
    uid integer NOT NULL,
    fname character varying(60),
    lname character varying(60),
    gender boolean,
    mail character varying(255),
    about text,
    phone character varying(20),
    fbprofile character varying(255)
);


ALTER TABLE public.profile OWNER TO crdbuser;

--
-- Name: role; Type: TABLE; Schema: public; Owner: crdbuser; Tablespace: 
--

CREATE TABLE role (
    rid integer NOT NULL,
    name character varying(64)
);


ALTER TABLE public.role OWNER TO crdbuser;

--
-- Name: role_permission; Type: TABLE; Schema: public; Owner: crdbuser; Tablespace: 
--

CREATE TABLE role_permission (
    rid integer NOT NULL,
    permission character varying(128) NOT NULL
);


ALTER TABLE public.role_permission OWNER TO crdbuser;

--
-- Name: show; Type: TABLE; Schema: public; Owner: crdbuser; Tablespace: 
--

CREATE TABLE show (
    sid integer NOT NULL,
    title character varying(255),
    ttime integer,
    duration integer,
    description text,
    file character varying(255)
);


ALTER TABLE public.show OWNER TO crdbuser;

--
-- Name: show_rjs; Type: TABLE; Schema: public; Owner: crdbuser; Tablespace: 
--

CREATE TABLE show_rjs (
    sid integer NOT NULL,
    uid integer NOT NULL
);


ALTER TABLE public.show_rjs OWNER TO crdbuser;

--
-- Name: user; Type: TABLE; Schema: public; Owner: crdbuser; Tablespace: 
--

CREATE TABLE user (
    uid integer NOT NULL,
    name character varying(60),
    pass character varying(128),
    mail character varying(64),
    created integer,
    access integer
);


ALTER TABLE public.user OWNER TO crdbuser;

--
-- Name: user_roles; Type: TABLE; Schema: public; Owner: crdbuser; Tablespace: 
--

CREATE TABLE user_roles (
    uid integer NOT NULL,
    rid integer NOT NULL
);


ALTER TABLE public.user_roles OWNER TO crdbuser;

--
-- Data for Name: comment; Type: TABLE DATA; Schema: public; Owner: crdbuser
--

COPY comment (cid, pid, uid, sid, subject, created, name, mail) FROM stdin;
\.


--
-- Data for Name: news_item; Type: TABLE DATA; Schema: public; Owner: crdbuser
--

COPY news_item (nid, uid, heading, body, created) FROM stdin;
\.


--
-- Data for Name: poll; Type: TABLE DATA; Schema: public; Owner: crdbuser
--

COPY poll (pollid, runtime, active) FROM stdin;
\.


--
-- Data for Name: poll_choice; Type: TABLE DATA; Schema: public; Owner: crdbuser
--

COPY poll_choice (chid, pollid, chtext, chvotes, weight) FROM stdin;
\.


--
-- Data for Name: poll_vote; Type: TABLE DATA; Schema: public; Owner: crdbuser
--

COPY poll_vote (chid, pollid, uid, "timestamp") FROM stdin;
\.


--
-- Data for Name: profile; Type: TABLE DATA; Schema: public; Owner: crdbuser
--

COPY profile (uid, fname, lname, gender, mail, about, phone, fbprofile) FROM stdin;
\.


--
-- Data for Name: role; Type: TABLE DATA; Schema: public; Owner: crdbuser
--

COPY role (rid, name) FROM stdin;
\.


--
-- Data for Name: role_permission; Type: TABLE DATA; Schema: public; Owner: crdbuser
--

COPY role_permission (rid, permission) FROM stdin;
\.


--
-- Data for Name: show; Type: TABLE DATA; Schema: public; Owner: crdbuser
--

COPY show (sid, title, ttime, duration, description, file) FROM stdin;
\.


--
-- Data for Name: show_rjs; Type: TABLE DATA; Schema: public; Owner: crdbuser
--

COPY show_rjs (sid, uid) FROM stdin;
\.


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: crdbuser
--

COPY user (uid, name, pass, mail, created, access) FROM stdin;
\.


--
-- Data for Name: user_roles; Type: TABLE DATA; Schema: public; Owner: crdbuser
--

COPY user_roles (uid, rid) FROM stdin;
\.

--
-- Name: comment_pkey; Type: CONSTRAINT; Schema: public; Owner: crdbuser; Tablespace: 
--

ALTER TABLE ONLY comment
    ADD CONSTRAINT comment_pkey PRIMARY KEY (cid);


--
-- Name: news_item_pkey; Type: CONSTRAINT; Schema: public; Owner: crdbuser; Tablespace: 
--

ALTER TABLE ONLY news_item
    ADD CONSTRAINT news_item_pkey PRIMARY KEY (nid);


--
-- Name: poll_choice_pkey; Type: CONSTRAINT; Schema: public; Owner: crdbuser; Tablespace: 
--

ALTER TABLE ONLY poll_choice
    ADD CONSTRAINT poll_choice_pkey PRIMARY KEY (chid);


--
-- Name: poll_pkey; Type: CONSTRAINT; Schema: public; Owner: crdbuser; Tablespace: 
--

ALTER TABLE ONLY poll
    ADD CONSTRAINT poll_pkey PRIMARY KEY (pollid);


--
-- Name: poll_vote_pkey; Type: CONSTRAINT; Schema: public; Owner: crdbuser; Tablespace: 
--

ALTER TABLE ONLY poll_vote
    ADD CONSTRAINT poll_vote_pkey PRIMARY KEY (pollid, uid);


--
-- Name: profile_pkey; Type: CONSTRAINT; Schema: public; Owner: crdbuser; Tablespace: 
--

ALTER TABLE ONLY profile
    ADD CONSTRAINT profile_pkey PRIMARY KEY (uid);


--
-- Name: role_permission_pkey; Type: CONSTRAINT; Schema: public; Owner: crdbuser; Tablespace: 
--

ALTER TABLE ONLY role_permission
    ADD CONSTRAINT role_permission_pkey PRIMARY KEY (rid, permission);


--
-- Name: role_pkey; Type: CONSTRAINT; Schema: public; Owner: crdbuser; Tablespace: 
--

ALTER TABLE ONLY role
    ADD CONSTRAINT role_pkey PRIMARY KEY (rid);


--
-- Name: show_pkey; Type: CONSTRAINT; Schema: public; Owner: crdbuser; Tablespace: 
--

ALTER TABLE ONLY show
    ADD CONSTRAINT show_pkey PRIMARY KEY (sid);


--
-- Name: show_rjs_pkey; Type: CONSTRAINT; Schema: public; Owner: crdbuser; Tablespace: 
--

ALTER TABLE ONLY show_rjs
    ADD CONSTRAINT show_rjs_pkey PRIMARY KEY (sid, uid);


--
-- Name: user_pkey; Type: CONSTRAINT; Schema: public; Owner: crdbuser; Tablespace: 
--

ALTER TABLE ONLY user
    ADD CONSTRAINT user_pkey PRIMARY KEY (uid);


--
-- Name: user_roles_pkey; Type: CONSTRAINT; Schema: public; Owner: crdbuser; Tablespace: 
--

ALTER TABLE ONLY user_roles
    ADD CONSTRAINT user_roles_pkey PRIMARY KEY (uid, rid);

--
-- Name: comment_sid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: crdbuser
--

ALTER TABLE ONLY comment
    ADD CONSTRAINT comment_sid_fkey FOREIGN KEY (sid) REFERENCES show(sid);


--
-- Name: comment_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: crdbuser
--

ALTER TABLE ONLY comment
    ADD CONSTRAINT comment_uid_fkey FOREIGN KEY (uid) REFERENCES user(uid);


--
-- Name: news_item_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: crdbuser
--

ALTER TABLE ONLY news_item
    ADD CONSTRAINT news_item_uid_fkey FOREIGN KEY (uid) REFERENCES user(uid);


--
-- Name: poll_choice_pollid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: crdbuser
--

ALTER TABLE ONLY poll_choice
    ADD CONSTRAINT poll_choice_pollid_fkey FOREIGN KEY (pollid) REFERENCES poll(pollid);


--
-- Name: poll_vote_chid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: crdbuser
--

ALTER TABLE ONLY poll_vote
    ADD CONSTRAINT poll_vote_chid_fkey FOREIGN KEY (chid) REFERENCES poll_choice(chid);


--
-- Name: poll_vote_pollid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: crdbuser
--

ALTER TABLE ONLY poll_vote
    ADD CONSTRAINT poll_vote_pollid_fkey FOREIGN KEY (pollid) REFERENCES poll(pollid);


--
-- Name: poll_vote_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: crdbuser
--

ALTER TABLE ONLY poll_vote
    ADD CONSTRAINT poll_vote_uid_fkey FOREIGN KEY (uid) REFERENCES user(uid);


--
-- Name: profile_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: crdbuser
--

ALTER TABLE ONLY profile
    ADD CONSTRAINT profile_uid_fkey FOREIGN KEY (uid) REFERENCES user(uid);


--
-- Name: role_permission_rid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: crdbuser
--

ALTER TABLE ONLY role_permission
    ADD CONSTRAINT role_permission_rid_fkey FOREIGN KEY (rid) REFERENCES role(rid);


--
-- Name: show_rjs_sid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: crdbuser
--

ALTER TABLE ONLY show_rjs
    ADD CONSTRAINT show_rjs_sid_fkey FOREIGN KEY (sid) REFERENCES show(sid);


--
-- Name: show_rjs_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: crdbuser
--

ALTER TABLE ONLY show_rjs
    ADD CONSTRAINT show_rjs_uid_fkey FOREIGN KEY (uid) REFERENCES user(uid);


--
-- Name: user_roles_rid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: crdbuser
--

ALTER TABLE ONLY user_roles
    ADD CONSTRAINT user_roles_rid_fkey FOREIGN KEY (rid) REFERENCES role(rid);


--
-- Name: user_roles_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: crdbuser
--

ALTER TABLE ONLY user_roles
    ADD CONSTRAINT user_roles_uid_fkey FOREIGN KEY (uid) REFERENCES user(uid);


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

