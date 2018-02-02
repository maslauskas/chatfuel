# CHATFUEL pajungimas #

#### 1. Reikalingas papildomas laukas: ####
Reikia prie kiekvieno kliento išsaugoti `bf_messenger_id` lauką;

#### 2. Skripto pridėjimas: ####
Registracijos pirmame žingsnyje reikalingas Chatfuel Facebook Checkbox skriptas `src/facebook.html`.

`AppId` reikšmė: kimtamasis `FB_APP_ID`\
`PageId` reikšmė: kimtamasis `FB_PAGE_ID`\
`CustomerId` reikšmė: `customerId_` + `NAUJO_KLIENTO_CUSTOMER_ID` (gali būti bet kokia kita unikali reikšmė, pagal kurią galima atpažinti klientą duomenų bazėje). **Prefiksas `customerId_` privalomas!**

**PASTABA:** kodo pabaigoje, `<div>` elemente taip pat naudojamos šių kintamųjų reikšmės.

Ant registracijos mygtuko uždedam atributą `onclick`:
```
<button type="button" onclick="window.register();">Registruotis</button>
```
```javascript
window.register = function() {
    // sukuriam klientą
    
    // duodam Chatfuel leidimą siųsti klientui žinutes
    window.confirmOptIn();
    
    // tęsiam registraciją
}
```

Per šį metodą Chatfuel bus suteikiama prieiga siųsti žinutes klientui per FB messenger. Galima tęsti registraciją.

#### 3. `fb_messenger_id` išsaugojimas:
Gavęs leidimą klientui siųsti žinutes, Chatfuel į atskirą URL paduos kliento Facebook Messenger ID. Tam reikalingas atskiras API endpoint, priimantis `customer_id` ir `fb_messenger_id`.
`customer_id` reikšmėje nuėmus `customerId_` prefiksą, gausim kliento ID sistemoje. Pagal tai jam priskiriame gautą `fb_messenger_id`

#### 4. Registracijos pabaiga:
Po sėkmingai iki galo užbaigtos kliento registracijos, siunčiame `POST` užklausą į Chatfuel. Kodo pavyzdys faile `src/complete.php`.

### Kintamieji:
Visos reikalingos kintamųju reikšmės pateiktos atskirai.