<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Het :attribute moet geaccepteerd zijn.',
    'active_url' => 'Het :attribute is geen geldige URL.',
    'after' => 'Het :attribute moet een datum na :date zijn.',
    'after_or_equal' => 'Het :attribute moet een datum na of gelijk aan :date zijn.',
    'alpha' => 'Het :attribute mag alleen letters bevatten.',
    'alpha_dash' => 'Het :attribute mag alleen letters, nummers, streepjes en underscores bevatten.',
    'alpha_num' => 'Het :attribute mag alleen letters en nummers bevatten.',
    'array' => 'Het :attribute moet een array zijn.',
    'before' => 'Het :attribute moet een datum voor :date zijn.',
    'before_or_equal' => 'Het :attribute moet een datum voor of gelijk aan :date zijn.',
    'between' => [
        'numeric' => 'Het :attribute moet tussen :min en :max liggen.',
        'file' => 'Het :attribute moet tussen :min en :max kilobytes liggen.',
        'string' => 'Het :attribute moet tussen :min en :max karakters liggen.',
        'array' => 'Het :attribute moet tussen :min en :max items bevatten.',
    ],
    'boolean' => 'Het :attribute veld moet waar of onwaar zijn.',
    'confirmed' => 'Het :attribute bevestiging komt niet overeen.',
    'date' => 'Het :attribute is geen geldige datum.',
    'date_equals' => 'Het :attribute moet een datum gelijk aan :date zijn.',
    'date_format' => 'Het :attribute komt niet overeen met het formaat :format.',
    'different' => 'Het :attribute en :other moeten verschillend zijn.',
    'digits' => 'Het :attribute moet :digits cijfers zijn.',
    'digits_between' => 'Het :attribute moet tussen :min en :max cijfers zijn.',
    'dimensions' => 'Het :attribute heeft ongeldige afbeeldingsafmetingen.',
    'distinct' => 'Het :attribute veld heeft een dubbele waarde.',
    'email' => 'Het :attribute moet een geldig e-mailadres zijn.',
    'ends_with' => 'Het :attribute moet eindigen met een van de volgende: :values.',
    'exists' => 'Het geselecteerde :attribute is ongeldig.',
    'file' => 'Het :attribute moet een bestand zijn.',
    'filled' => 'Het :attribute veld moet een waarde hebben.',
    'gt' => [
        'numeric' => 'Het :attribute moet groter zijn dan :value.',
        'file' => 'Het :attribute moet groter zijn dan :value kilobytes.',
        'string' => 'Het :attribute moet groter zijn dan :value karakters.',
        'array' => 'Het :attribute moet meer dan :value items bevatten.',
    ],
    'gte' => [
        'numeric' => 'Het :attribute moet groter zijn dan of gelijk zijn aan :value.',
        'file' => 'Het :attribute moet groter zijn dan of gelijk zijn aan :value kilobytes.',
        'string' => 'Het :attribute moet groter zijn dan of gelijk zijn aan :value karakters.',
        'array' => 'Het :attribute moet :value items of meer bevatten.',
    ],
    'image' => 'Het :attribute moet een afbeelding zijn.',
    'in' => 'Het geselecteerde :attribute is ongeldig.',
    'in_array' => 'Het :attribute veld bestaat niet in :other.',
    'integer' => 'Het :attribute moet een geheel getal zijn.',
    'ip' => 'Het :attribute moet een geldig IP-adres zijn.',
    'ipv4' => 'Het :attribute moet een geldig IPv4-adres zijn.',
    'ipv6' => 'Het :attribute moet een geldig IPv6-adres zijn.',
    'json' => 'Het :attribute moet een geldige JSON-tekenreeks zijn.',
    'lt' => [
        'numeric' => 'Het :attribute moet kleiner zijn dan :value.',
        'file' => 'Het :attribute moet kleiner zijn dan :value kilobytes.',
        'string' => 'Het :attribute moet kleiner zijn dan :value karakters.',
        'array' => 'Het :attribute moet minder dan :value items bevatten.',
    ],
    'lte' => [
        'numeric' => 'Het :attribute moet kleiner zijn dan of gelijk zijn aan :value.',
        'file' => 'Het :attribute moet kleiner zijn dan of gelijk zijn aan :value kilobytes.',
        'string' => 'Het :attribute moet kleiner zijn dan of gelijk zijn aan :value karakters.',
        'array' => 'Het :attribute mag niet meer dan :value items bevatten.',
    ],
    'max' => [
        'numeric' => 'Het :attribute mag niet groter zijn dan :max.',
        'file' => 'Het :attribute mag niet groter zijn dan :max kilobytes.',
        'string' => 'Het :attribute mag niet groter zijn dan :max karakters.',
        'array' => 'Het :attribute mag niet meer dan :max items bevatten.',
    ],
    'mimes' => 'Het :attribute moet een bestand zijn van het type: :values.',
    'mimetypes' => 'Het :attribute moet een bestand zijn van het type: :values.',
    'min' => [
        'numeric' => 'Het :attribute moet minimaal :min zijn.',
        'file' => 'Het :attribute moet minimaal :min kilobytes zijn.',
        'string' => 'Het :attribute moet minimaal :min karakters zijn.',
        'array' => 'Het :attribute moet minimaal :min items bevatten.',
    ],
    'not_in' => 'Het geselecteerde :attribute is ongeldig.',
    'not_regex' => 'Het :attribute formaat is ongeldig.',
    'numeric' => 'Het :attribute moet een getal zijn.',
    'password' => 'Het wachtwoord is onjuist.',
    'present' => 'Het :attribute veld moet aanwezig zijn.',
    'regex' => 'Het :attribute formaat is ongeldig.',
    'required' => 'Het :attribute veld is verplicht.',
    'required_if' => 'Het :attribute veld is verplicht wanneer :other is :value.',
    'required_unless' => 'Het :attribute veld is verplicht tenzij :other in :values zit.',
    'required_with' => 'Het :attribute veld is verplicht wanneer :values aanwezig is.',
    'required_with_all' => 'Het :attribute veld is verplicht wanneer :values aanwezig is.',
    'required_without' => 'Het :attribute veld is verplicht wanneer :values niet aanwezig is.',
    'required_without_all' => 'Het :attribute veld is verplicht wanneer geen van :values aanwezig is.',
    'same' => 'Het :attribute en :other moeten overeenkomen.',
    'size' => [
        'numeric' => 'Het :attribute moet :size zijn.',
        'file' => 'Het :attribute moet :size kilobytes zijn.',
        'string' => 'Het :attribute moet :size karakters zijn.',
        'array' => 'Het :attribute moet :size items bevatten.',
    ],
    'starts_with' => 'Het :attribute moet beginnen met een van de volgende: :values.',
    'string' => 'Het :attribute moet een tekenreeks zijn.',
    'timezone' => 'Het :attribute moet een geldige zone zijn.',
    'unique' => 'Het :attribute is al bezet.',
    'uploaded' => 'Het :attribute kon niet worden geüpload.',
    'url' => 'Het :attribute formaat is ongeldig.',
    'uuid' => 'Het :attribute moet een geldig UUID zijn.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'attributes' => [],
];
