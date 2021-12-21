SELECT DISTINCT
    d.age agence,
    d.cli code_client,
    d.eve numero_dossier,
    RIGHT(h0.refdos, 2) avenant,
    d.typ type_pret,
    t.libe libelle,
    d.dmep,
    d.ctr,
    d.eta,
    d.dtan,
    CASE
        WHEN (SELECT COUNT(*) FROM bkdosprt bkdosprt0 WHERE bkdosprt0.cli = d.cli AND bkdosprt0.eve = d.eve) > 1 AND (h.mon + ABS(c.sde)) = c.sde * 2 THEN 0
        WHEN (SELECT COUNT(*) FROM bkdosprt bkdosprt0 WHERE bkdosprt0.cli = d.cli AND bkdosprt0.eve = d.eve) > 1 THEN (h.mon + ABS(c.sde))
        ELSE ABS(c.sde + cr.sde)
    END montant_remb,
    c.ncp cpt_covid,
    c.sde solde_covid,
    c.sin solde_indicatif_covid,
    cr.ncp cpt_creance,
    CASE
        WHEN (SELECT COUNT(*) FROM bkdosprt bkdosprt0 WHERE bkdosprt0.cli = d.cli ) > 1 THEN h.mon
        ELSE cr.sde
    END montant_creance,
    cr.sde solde_creance,
    cr.sin solde_indicatif_creance,
    dep.ncp cpt_depot
FROM
    bkdosprt d
INNER JOIN bkcom c
ON
    (
        c.cli = d.cli
    AND c.cpro = '096'
    AND c.cfe = 'N'
    )
INNER JOIN bkcom cr
    ON (cr.cli = c.cli AND cr.cpro = '299')
INNER JOIN bkhis h0
    ON (c.cpro = '096' AND c.cfe = 'N' AND h0.ncp = c.ncp AND h0.age= c.age AND h0.dev = c.dev AND h0.sen = 'D' AND h0.ope <> 'E79')
INNER JOIN bkhis h
    ON (c.cpro = '096' AND c.cfe = 'N' AND h.ncp = c.ncp AND h.age= c.age AND h.dev = c.dev AND UPPER(h.lib) LIKE '%PASSAGE CREANCE RATTACHE%' AND h.sen = 'C' AND h0.refdos[1,6] = d.eve AND RIGHT(h0.refdos, 2) = d.ave)
LEFT JOIN bkcom dep
    ON (dep.cli = c.cli AND dep.age = c.age AND dep.dev = c.dev AND dep.cpro IN ('007','008') AND dep.ife = 'N' AND dep.cfe = 'N')
INNER JOIN bktyprt t
    ON (t.typ = d.typ)
WHERE
    d.age <> '95000'
AND d.ctr = 9
AND d.eta='VA'
AND (c.sde + cr.sde) = 0
AND d.dtan > '20200403'
AND c.sin = 0
AND t.typ NOT IN ('114', '024', '115', '113', '019', '112', '040', '041', '042', '043', '044', '045', '046', '047', '098', '099')
GROUP BY
    1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19