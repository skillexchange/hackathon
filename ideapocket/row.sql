SELECT 
 `t0`.`id` AS `t0_c0`,
 `t0`.`title` AS `t0_c1`,
 `t0`.`description` AS `t0_c2`,
 `t0`.`user` AS `t0_c3`,
 `t0`.`deleted` AS `t0_c4`,
 `t0`.`liked` AS `t0_c5`,
 `t0`.`created_at` AS `t0_c6`,
 `t0`.`updated_at` AS `t0_c7`,

 `t1`.`id` AS `t1_c0`,
 `t1`.`title` AS `t1_c1`,
 `t1`.`description` AS `t1_c2`,
 `t1`.`user` AS `t1_c3`,
 `t1`.`url` AS `t1_c4`,
 `t1`.`issue_id` AS `t1_c5`,
 `t1`.`deleted` AS `t1_c6`,
 `t1`.`liked` AS `t1_c7`,
 `t1`.`created_at` AS `t1_c8`,
 `t1`.`updated_at` AS `t1_c9`,

 `t2`.`id` AS `t2_c0`,
 `t2`.`issue_id` AS `t2_c1`,
 `t2`.`solution_id` AS `t2_c2`,
 `t2`.`user` AS `t2_c3`,
 `t2`.`deleted` AS `t2_c4`,
 `t2`.`created_at` AS `t2_c5`,
 `t2`.`updated_at` AS `t2_c6` 
FROM `issues` AS `t0` LEFT JOIN () AS `t1` ON (`t0`.`id` = `t1`.`issue_id`)
LEFT JOIN 
`likes` AS `t2`
ON (`t0`.`id` = `t2`.`issue_id`)
WHERE `t1`.`deleted` = 0 ORDER BY `t1`.`created_at` DESC
