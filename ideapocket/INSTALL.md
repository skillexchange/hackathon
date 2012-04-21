#!/bin/sh
#firststep INSTALL

oil create ideapocket

edit db.php for your database
create database `ideapocket` default character set utf8 collate utf8_general_ci;

oil g scaffold issue title:text description:text user:string deleted:int likes:int
oil g scaffold solution title:text description:text user:string url:text deleted:int likes:int
oil g scaffold like issue_id:int solution_id:int comment_id user:string deleted:int
oil g scaffold comment  description:text user:string  deleted:int likes:int
oil refine migrate


