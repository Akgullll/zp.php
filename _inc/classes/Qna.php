<?php

class Qna {
    private $questions = [
        "Aké špecifické vlastnosti robia produkty Apple jedinečnými?" => "Spoločnosť Apple je známa svojím dizajnom, spoľahlivosťou, ekosystémom zariadení a softvérovými riešeniami ako sú iOS a MacOS.",
        "Aké výhody majú používatelia zariadení Apple?" => "Používatelia získavajú vysokú kvalitu zariadení, integráciu medzi zariadeniami, bezpečnosť údajov a široký výber aplikácií.",
        "Aká je politika Apple týkajúca sa ochrany údajov a súkromia?" => "Spoločnosť Apple kladie veľký dôraz na ochranu údajov a súkromia používateľov prostredníctvom šifrovania a prísnych politík súkromia.",
        "Aké technológie sa používajú v produktoch Apple?" => "Spoločnosť Apple využíva vlastné technológie ako čipy série A, Face ID, Touch ID, Retina displeje a ďalšie.",
        "Ako prebieha synchronizácia medzi rôznymi zariadeniami Apple?" => "Synchronizácia prebieha cez iCloud, čo zabezpečuje prenos údajov medzi iPhone, iPad, MacBook a ďalšími zariadeniami.",
        "Čo je iOS a ktoré zariadenia túto operačnú systém podporujú?" => "iOS - mobilný operačný systém, ktorý vyvinula spoločnosť Apple pre zariadenia iPhone, iPad a iPod Touch.",
        "Aké výhody poskytuje MacBook oproti iným notebookom?" => "MacBook ponúka vysoký výkon, dlhú výdrž batérie, vynikajúci Retina displej a pohodlné používanie operačného systému macOS.",
        "Čo je Face ID a Touch ID?" => "Face ID je biometrická technológia rozpoznávania tváre, zatiaľ čo Touch ID je čítačka odtlačkov prstov, používaná na odomknutie zariadení a autorizáciu platieb.",
        "Aké možnosti ponúka Apple Watch?" => "Apple Watch poskytuje množstvo funkcií, vrátane sledovania zdravia, fitness monitoringu, upozornení na hovory a správy a ďalšie.",
        "Ako prebieha aktualizácia operačného systému na zariadeniach Apple?" => "Aktualizácie operačných systémov iOS a macOS sú k dispozícii v nastaveniach zariadení Apple.",
        "Aká je ekologická politika spoločnosti Apple?" => "Spoločnosť Apple sa snaží minimalizovať vplyv na životné prostredie, používa udržateľné materiály a recyklačné procesy vo svojich zariadeniach."
    ];

    public function getQnaHTML() {
        $html = '<div class="accordion">';
        foreach ($this->questions as $question => $answer) {
            $html .= '<details>';
            $html .= '<summary>' . $question . '</summary>';
            $html .= '<p>' . $answer . '</p>';
            $html .= '</details>';
        }
        $html .= '</div>';
        return $html;
    }
}

?>


