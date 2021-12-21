/* Exemple 1 : table sans alias */
SELECT
    bkcom.age,
    bkcom.ncp,
    bkcom.dou,
    bkcom.cha,
    bkcom.cli,
    bkcom.inti,
    bkcom.sde,
    bkcom.typ,
    bkcom.cpro,
    bkcom.ife,
    bkcom.cfe
FROM
    bkcom
INNER JOIN bkcli
ON
    (
        bkcli.cli = bkcom.cli
    AND bkcli.tcli = '1'
    AND bkcli.qua = '02'
    )
WHERE
    bkcom.cpro = '007'
AND bkcom.ife = 'N'
AND bkcom.cfe = 'N';
/* Exemple 2 : table avec alias */
/* sans AS */
SELECT
    c.age,
    c.ncp,
    c.dou,
    c.cha,
    c.cli,
    c.inti,
    c.sde,
    c.typ,
    c.cpro,
    c.ife,
    c.cfe
FROM
    bkcom        AS c
INNER JOIN bkcli AS cl
ON
    (
        cl.cli = c.cli
    AND cl.tcli = '1'
    AND cl.qua = '02'
    )
WHERE
    c.cpro = '007'
AND c.ife = 'N'
AND c.cfe = 'N';
/* utlisation de AS */
SELECT
    c.age,
    c.ncp,
    c.dou,
    c.cha,
    c.cli,
    c.inti,
    c.sde,
    c.typ,
    c.cpro,
    c.ife,
    c.cfe
FROM
    bkcom c
INNER JOIN bkcli cl
ON
    (
        cl.cli = c.cli
    AND cl.tcli = '1'
    AND cl.qua = '02'
    )
WHERE
    c.cpro = '007'
AND c.ife = 'N'
AND c.cfe = 'N';
/* Exemple 3 : condition sans WHERE */
SELECT
    c.age,
    c.ncp,
    c.dou,
    c.cha,
    c.cli,
    c.inti,
    c.sde,
    c.typ,
    c.cpro,
    c.ife,
    c.cfe
FROM
    bkcom c
INNER JOIN bkcli cl
ON
    (
        cl.cli = c.cli
    AND c.cpro = '007'
    AND c.ife = 'N'
    AND c.cfe = 'N'
    AND cl.tcli = '1'
    AND cl.qua = '02'
    );
/* Exemple 3 : condition dans WHERE */
SELECT
    c.age,
    c.ncp,
    c.dou,
    c.cha,
    c.cli,
    c.inti,
    c.sde,
    c.typ,
    c.cpro,
    c.ife,
    c.cfe
FROM
    bkcom c
INNER JOIN bkcli cl
ON
    (
        cl.cli = c.cli
    )
WHERE
    c.cpro = '007'
AND c.ife = 'N'
AND c.cfe = 'N'
AND cl.tcli = '1'
AND cl.qua = '02';