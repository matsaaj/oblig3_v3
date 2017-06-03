Ting som blir lagt ut burde inneholde sted (f.eks poststed).

Når en ny item blir laget, lagres publiseringsdatoen som en SQL TIMESTAMP (CURRENT_TIMESTAMP),
det formatet er ikke helt optimalt siden det ikke kan formateres. Må vurdere å skifte til unix timestamp.

Vurder å legge til "condition" for items, typ "Ny"/"Brukt".

Vurder å lage en offentlige profilside som kan inneholde f.eks antall ting gitt vekk.

Etter at man har publisert et item skal man kunne trykke på en link for å gå til .php siden
den ble publisert på, funksjonen er der men URL-src må fikses i script.js
