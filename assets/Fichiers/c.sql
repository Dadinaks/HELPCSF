SELECT
    covid.cli,
    covid.ncp,
    covid.sde,
    covid.cfe,
    covid.ife,
    covid.dfe,
    creance.ncp,
    creance.sde,
    creance.cfe,
    creance.ife,
    creance.dfe
FROM
    bkcom covid
INNER JOIN bkcom creance
ON
    creance.cli = covid.cli
AND creance.cpro = '299'
WHERE
    covid.cpro = '096'