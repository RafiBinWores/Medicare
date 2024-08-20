// UMD
(function (factory) {
    if (typeof module === "object" && module.exports) {
        module.exports = factory();
    } else {
        window.intlTelInput = factory();
    }
})(() => {
    var factoryOutput = (() => {
        var _ = Object.defineProperty;
        var A = Object.getOwnPropertyDescriptor;
        var S = Object.getOwnPropertyNames;
        var M = Object.prototype.hasOwnProperty;
        var x = (a, t) => {
                for (var e in t) _(a, e, { get: t[e], enumerable: !0 });
            },
            P = (a, t, e, i) => {
                if ((t && typeof t == "object") || typeof t == "function")
                    for (let n of S(t))
                        !M.call(a, n) &&
                            n !== e &&
                            _(a, n, {
                                get: () => t[n],
                                enumerable: !(i = A(t, n)) || i.enumerable,
                            });
                return a;
            };
        var H = (a) => P(_({}, "__esModule", { value: !0 }), a);
        var F = {};
        x(F, { Iti: () => b, default: () => U });
        var I = [
                ["af", "93"],
                ["al", "355"],
                ["dz", "213"],
                ["as", "1", 5, ["684"]],
                ["ad", "376"],
                ["ao", "244"],
                ["ai", "1", 6, ["264"]],
                ["ag", "1", 7, ["268"]],
                ["ar", "54"],
                ["am", "374"],
                ["aw", "297"],
                ["ac", "247"],
                ["au", "61", 0],
                ["at", "43"],
                ["az", "994"],
                ["bs", "1", 8, ["242"]],
                ["bh", "973"],
                ["bd", "880"],
                ["bb", "1", 9, ["246"]],
                ["by", "375"],
                ["be", "32"],
                ["bz", "501"],
                ["bj", "229"],
                ["bm", "1", 10, ["441"]],
                ["bt", "975"],
                ["bo", "591"],
                ["ba", "387"],
                ["bw", "267"],
                ["br", "55"],
                ["io", "246"],
                ["vg", "1", 11, ["284"]],
                ["bn", "673"],
                ["bg", "359"],
                ["bf", "226"],
                ["bi", "257"],
                ["kh", "855"],
                ["cm", "237"],
                [
                    "ca",
                    "1",
                    1,
                    [
                        "204",
                        "226",
                        "236",
                        "249",
                        "250",
                        "263",
                        "289",
                        "306",
                        "343",
                        "354",
                        "365",
                        "367",
                        "368",
                        "382",
                        "387",
                        "403",
                        "416",
                        "418",
                        "428",
                        "431",
                        "437",
                        "438",
                        "450",
                        "584",
                        "468",
                        "474",
                        "506",
                        "514",
                        "519",
                        "548",
                        "579",
                        "581",
                        "584",
                        "587",
                        "604",
                        "613",
                        "639",
                        "647",
                        "672",
                        "683",
                        "705",
                        "709",
                        "742",
                        "753",
                        "778",
                        "780",
                        "782",
                        "807",
                        "819",
                        "825",
                        "867",
                        "873",
                        "879",
                        "902",
                        "905",
                    ],
                ],
                ["cv", "238"],
                ["bq", "599", 1, ["3", "4", "7"]],
                ["ky", "1", 12, ["345"]],
                ["cf", "236"],
                ["td", "235"],
                ["cl", "56"],
                ["cn", "86"],
                ["cx", "61", 2, ["89164"]],
                ["cc", "61", 1, ["89162"]],
                ["co", "57"],
                ["km", "269"],
                ["cg", "242"],
                ["cd", "243"],
                ["ck", "682"],
                ["cr", "506"],
                ["ci", "225"],
                ["hr", "385"],
                ["cu", "53"],
                ["cw", "599", 0],
                ["cy", "357"],
                ["cz", "420"],
                ["dk", "45"],
                ["dj", "253"],
                ["dm", "1", 13, ["767"]],
                ["do", "1", 2, ["809", "829", "849"]],
                ["ec", "593"],
                ["eg", "20"],
                ["sv", "503"],
                ["gq", "240"],
                ["er", "291"],
                ["ee", "372"],
                ["sz", "268"],
                ["et", "251"],
                ["fk", "500"],
                ["fo", "298"],
                ["fj", "679"],
                ["fi", "358", 0],
                ["fr", "33"],
                ["gf", "594"],
                ["pf", "689"],
                ["ga", "241"],
                ["gm", "220"],
                ["ge", "995"],
                ["de", "49"],
                ["gh", "233"],
                ["gi", "350"],
                ["gr", "30"],
                ["gl", "299"],
                ["gd", "1", 14, ["473"]],
                ["gp", "590", 0],
                ["gu", "1", 15, ["671"]],
                ["gt", "502"],
                ["gg", "44", 1, ["1481", "7781", "7839", "7911"]],
                ["gn", "224"],
                ["gw", "245"],
                ["gy", "592"],
                ["ht", "509"],
                ["hn", "504"],
                ["hk", "852"],
                ["hu", "36"],
                ["is", "354"],
                ["in", "91"],
                ["id", "62"],
                ["ir", "98"],
                ["iq", "964"],
                ["ie", "353"],
                ["im", "44", 2, ["1624", "74576", "7524", "7924", "7624"]],
                ["il", "972"],
                ["it", "39", 0],
                ["jm", "1", 4, ["876", "658"]],
                ["jp", "81"],
                [
                    "je",
                    "44",
                    3,
                    ["1534", "7509", "7700", "7797", "7829", "7937"],
                ],
                ["jo", "962"],
                ["kz", "7", 1, ["33", "7"]],
                ["ke", "254"],
                ["ki", "686"],
                ["xk", "383"],
                ["kw", "965"],
                ["kg", "996"],
                ["la", "856"],
                ["lv", "371"],
                ["lb", "961"],
                ["ls", "266"],
                ["lr", "231"],
                ["ly", "218"],
                ["li", "423"],
                ["lt", "370"],
                ["lu", "352"],
                ["mo", "853"],
                ["mg", "261"],
                ["mw", "265"],
                ["my", "60"],
                ["mv", "960"],
                ["ml", "223"],
                ["mt", "356"],
                ["mh", "692"],
                ["mq", "596"],
                ["mr", "222"],
                ["mu", "230"],
                ["yt", "262", 1, ["269", "639"]],
                ["mx", "52"],
                ["fm", "691"],
                ["md", "373"],
                ["mc", "377"],
                ["mn", "976"],
                ["me", "382"],
                ["ms", "1", 16, ["664"]],
                ["ma", "212", 0],
                ["mz", "258"],
                ["mm", "95"],
                ["na", "264"],
                ["nr", "674"],
                ["np", "977"],
                ["nl", "31"],
                ["nc", "687"],
                ["nz", "64"],
                ["ni", "505"],
                ["ne", "227"],
                ["ng", "234"],
                ["nu", "683"],
                ["nf", "672"],
                ["kp", "850"],
                ["mk", "389"],
                ["mp", "1", 17, ["670"]],
                ["no", "47", 0],
                ["om", "968"],
                ["pk", "92"],
                ["pw", "680"],
                ["ps", "970"],
                ["pa", "507"],
                ["pg", "675"],
                ["py", "595"],
                ["pe", "51"],
                ["ph", "63"],
                ["pl", "48"],
                ["pt", "351"],
                ["pr", "1", 3, ["787", "939"]],
                ["qa", "974"],
                ["re", "262", 0],
                ["ro", "40"],
                ["ru", "7", 0],
                ["rw", "250"],
                ["ws", "685"],
                ["sm", "378"],
                ["st", "239"],
                ["sa", "966"],
                ["sn", "221"],
                ["rs", "381"],
                ["sc", "248"],
                ["sl", "232"],
                ["sg", "65"],
                ["sx", "1", 21, ["721"]],
                ["sk", "421"],
                ["si", "386"],
                ["sb", "677"],
                ["so", "252"],
                ["za", "27"],
                ["kr", "82"],
                ["ss", "211"],
                ["es", "34"],
                ["lk", "94"],
                ["bl", "590", 1],
                ["sh", "290"],
                ["kn", "1", 18, ["869"]],
                ["lc", "1", 19, ["758"]],
                ["mf", "590", 2],
                ["pm", "508"],
                ["vc", "1", 20, ["784"]],
                ["sd", "249"],
                ["sr", "597"],
                ["sj", "47", 1, ["79"]],
                ["se", "46"],
                ["ch", "41"],
                ["sy", "963"],
                ["tw", "886"],
                ["tj", "992"],
                ["tz", "255"],
                ["th", "66"],
                ["tl", "670"],
                ["tg", "228"],
                ["tk", "690"],
                ["to", "676"],
                ["tt", "1", 22, ["868"]],
                ["tn", "216"],
                ["tr", "90"],
                ["tm", "993"],
                ["tc", "1", 23, ["649"]],
                ["tv", "688"],
                ["ug", "256"],
                ["ua", "380"],
                ["ae", "971"],
                ["gb", "44", 0],
                ["us", "1", 0],
                ["uy", "598"],
                ["vi", "1", 24, ["340"]],
                ["uz", "998"],
                ["vu", "678"],
                ["va", "39", 1, ["06698"]],
                ["ve", "58"],
                ["vn", "84"],
                ["wf", "681"],
                ["eh", "212", 1, ["5288", "5289"]],
                ["ye", "967"],
                ["zm", "260"],
                ["zw", "263"],
                ["ax", "358", 1, ["18"]],
            ],
            w = [];
        for (let a = 0; a < I.length; a++) {
            let t = I[a];
            w[a] = {
                name: "",
                iso2: t[0],
                dialCode: t[1],
                priority: t[2] || 0,
                areaCodes: t[3] || null,
                nodeById: {},
            };
        }
        var C = w;
        var L = {
            af: "Afghanistan",
            ax: "\xC5land Islands",
            al: "Albania",
            dz: "Algeria",
            as: "American Samoa",
            ad: "Andorra",
            ao: "Angola",
            ai: "Anguilla",
            aq: "Antarctica",
            ag: "Antigua & Barbuda",
            ar: "Argentina",
            am: "Armenia",
            aw: "Aruba",
            au: "Australia",
            at: "Austria",
            az: "Azerbaijan",
            bs: "Bahamas",
            bh: "Bahrain",
            bd: "Bangladesh",
            bb: "Barbados",
            by: "Belarus",
            be: "Belgium",
            bz: "Belize",
            bj: "Benin",
            bm: "Bermuda",
            bt: "Bhutan",
            bo: "Bolivia",
            ba: "Bosnia & Herzegovina",
            bw: "Botswana",
            bv: "Bouvet Island",
            br: "Brazil",
            io: "British Indian Ocean Territory",
            vg: "British Virgin Islands",
            bn: "Brunei",
            bg: "Bulgaria",
            bf: "Burkina Faso",
            bi: "Burundi",
            kh: "Cambodia",
            cm: "Cameroon",
            ca: "Canada",
            cv: "Cape Verde",
            bq: "Caribbean Netherlands",
            ky: "Cayman Islands",
            cf: "Central African Republic",
            td: "Chad",
            cl: "Chile",
            cn: "China",
            cx: "Christmas Island",
            cc: "Cocos (Keeling) Islands",
            co: "Colombia",
            km: "Comoros",
            cg: "Congo - Brazzaville",
            cd: "Congo - Kinshasa",
            ck: "Cook Islands",
            cr: "Costa Rica",
            ci: "C\xF4te d\u2019Ivoire",
            hr: "Croatia",
            cu: "Cuba",
            cw: "Cura\xE7ao",
            cy: "Cyprus",
            cz: "Czechia",
            dk: "Denmark",
            dj: "Djibouti",
            dm: "Dominica",
            do: "Dominican Republic",
            ec: "Ecuador",
            eg: "Egypt",
            sv: "El Salvador",
            gq: "Equatorial Guinea",
            er: "Eritrea",
            ee: "Estonia",
            sz: "Eswatini",
            et: "Ethiopia",
            fk: "Falkland Islands",
            fo: "Faroe Islands",
            fj: "Fiji",
            fi: "Finland",
            fr: "France",
            gf: "French Guiana",
            pf: "French Polynesia",
            tf: "French Southern Territories",
            ga: "Gabon",
            gm: "Gambia",
            ge: "Georgia",
            de: "Germany",
            gh: "Ghana",
            gi: "Gibraltar",
            gr: "Greece",
            gl: "Greenland",
            gd: "Grenada",
            gp: "Guadeloupe",
            gu: "Guam",
            gt: "Guatemala",
            gg: "Guernsey",
            gn: "Guinea",
            gw: "Guinea-Bissau",
            gy: "Guyana",
            ht: "Haiti",
            hm: "Heard & McDonald Islands",
            hn: "Honduras",
            hk: "Hong Kong SAR China",
            hu: "Hungary",
            is: "Iceland",
            in: "India",
            id: "Indonesia",
            ir: "Iran",
            iq: "Iraq",
            ie: "Ireland",
            im: "Isle of Man",
            il: "Israel",
            it: "Italy",
            jm: "Jamaica",
            jp: "Japan",
            je: "Jersey",
            jo: "Jordan",
            kz: "Kazakhstan",
            ke: "Kenya",
            ki: "Kiribati",
            kw: "Kuwait",
            kg: "Kyrgyzstan",
            la: "Laos",
            lv: "Latvia",
            lb: "Lebanon",
            ls: "Lesotho",
            lr: "Liberia",
            ly: "Libya",
            li: "Liechtenstein",
            lt: "Lithuania",
            lu: "Luxembourg",
            mo: "Macao SAR China",
            mg: "Madagascar",
            mw: "Malawi",
            my: "Malaysia",
            mv: "Maldives",
            ml: "Mali",
            mt: "Malta",
            mh: "Marshall Islands",
            mq: "Martinique",
            mr: "Mauritania",
            mu: "Mauritius",
            yt: "Mayotte",
            mx: "Mexico",
            fm: "Micronesia",
            md: "Moldova",
            mc: "Monaco",
            mn: "Mongolia",
            me: "Montenegro",
            ms: "Montserrat",
            ma: "Morocco",
            mz: "Mozambique",
            mm: "Myanmar (Burma)",
            na: "Namibia",
            nr: "Nauru",
            np: "Nepal",
            nl: "Netherlands",
            nc: "New Caledonia",
            nz: "New Zealand",
            ni: "Nicaragua",
            ne: "Niger",
            ng: "Nigeria",
            nu: "Niue",
            nf: "Norfolk Island",
            kp: "North Korea",
            mk: "North Macedonia",
            mp: "Northern Mariana Islands",
            no: "Norway",
            om: "Oman",
            pk: "Pakistan",
            pw: "Palau",
            ps: "Palestinian Territories",
            pa: "Panama",
            pg: "Papua New Guinea",
            py: "Paraguay",
            pe: "Peru",
            ph: "Philippines",
            pn: "Pitcairn Islands",
            pl: "Poland",
            pt: "Portugal",
            pr: "Puerto Rico",
            qa: "Qatar",
            re: "R\xE9union",
            ro: "Romania",
            ru: "Russia",
            rw: "Rwanda",
            ws: "Samoa",
            sm: "San Marino",
            st: "S\xE3o Tom\xE9 & Pr\xEDncipe",
            sa: "Saudi Arabia",
            sn: "Senegal",
            rs: "Serbia",
            sc: "Seychelles",
            sl: "Sierra Leone",
            sg: "Singapore",
            sx: "Sint Maarten",
            sk: "Slovakia",
            si: "Slovenia",
            sb: "Solomon Islands",
            so: "Somalia",
            za: "South Africa",
            gs: "South Georgia & South Sandwich Islands",
            kr: "South Korea",
            ss: "South Sudan",
            es: "Spain",
            lk: "Sri Lanka",
            bl: "St. Barth\xE9lemy",
            sh: "St. Helena",
            kn: "St. Kitts & Nevis",
            lc: "St. Lucia",
            mf: "St. Martin",
            pm: "St. Pierre & Miquelon",
            vc: "St. Vincent & Grenadines",
            sd: "Sudan",
            sr: "Suriname",
            sj: "Svalbard & Jan Mayen",
            se: "Sweden",
            ch: "Switzerland",
            sy: "Syria",
            tw: "Taiwan",
            tj: "Tajikistan",
            tz: "Tanzania",
            th: "Thailand",
            tl: "Timor-Leste",
            tg: "Togo",
            tk: "Tokelau",
            to: "Tonga",
            tt: "Trinidad & Tobago",
            tn: "Tunisia",
            tr: "Turkey",
            tm: "Turkmenistan",
            tc: "Turks & Caicos Islands",
            tv: "Tuvalu",
            um: "U.S. Outlying Islands",
            vi: "U.S. Virgin Islands",
            ug: "Uganda",
            ua: "Ukraine",
            ae: "United Arab Emirates",
            gb: "United Kingdom",
            us: "United States",
            uy: "Uruguay",
            uz: "Uzbekistan",
            vu: "Vanuatu",
            va: "Vatican City",
            ve: "Venezuela",
            vn: "Vietnam",
            wf: "Wallis & Futuna",
            eh: "Western Sahara",
            ye: "Yemen",
            zm: "Zambia",
            zw: "Zimbabwe",
        };
        var T = {
            selectedCountryAriaLabel: "Selected country",
            noCountrySelected: "No country selected",
            countryListAriaLabel: "List of countries",
            searchPlaceholder: "Search",
            zeroSearchResults: "No results found",
            oneSearchResult: "1 result found",
            multipleSearchResults: "${count} results found",
            ac: "Ascension Island",
            xk: "Kosovo",
        };
        var E = { ...L, ...T };
        var O = 0,
            N = {
                allowDropdown: !0,
                autoPlaceholder: "polite",
                containerClass: "",
                countryOrder: null,
                customPlaceholder: null,
                dropdownContainer: null,
                excludeCountries: [],
                fixDropdownWidth: !0,
                formatAsYouType: !0,
                formatOnDisplay: !0,
                geoIpLookup: null,
                hiddenInput: null,
                i18n: {},
                initialCountry: "",
                nationalMode: !0,
                onlyCountries: [],
                placeholderNumberType: "MOBILE",
                showFlags: !0,
                separateDialCode: !1,
                strictMode: !1,
                useFullscreenPopup:
                    typeof navigator < "u" && typeof window < "u"
                        ? /Android.+Mobile|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
                              navigator.userAgent
                          ) || window.innerWidth <= 500
                        : !1,
                utilsScript: "",
            },
            R = [
                "800",
                "822",
                "833",
                "844",
                "855",
                "866",
                "877",
                "880",
                "881",
                "882",
                "883",
                "884",
                "885",
                "886",
                "887",
                "888",
                "889",
            ],
            f = (a) => a.replace(/\D/g, ""),
            D = (a = "") =>
                a
                    .normalize("NFD")
                    .replace(/[\u0300-\u036f]/g, "")
                    .toLowerCase(),
            k = (a) => {
                let t = f(a);
                if (t.charAt(0) === "1") {
                    let e = t.substr(1, 3);
                    return R.indexOf(e) !== -1;
                }
                return !1;
            },
            z = (a, t, e, i) => {
                if (e === 0 && !i) return 0;
                let n = 0;
                for (let s = 0; s < t.length; s++) {
                    if ((/[+0-9]/.test(t[s]) && n++, n === a && !i))
                        return s + 1;
                    if (i && n === a + 1) return s;
                }
                return t.length;
            },
            h = (a, t, e) => {
                let i = document.createElement(a);
                return (
                    t &&
                        Object.entries(t).forEach(([n, s]) =>
                            i.setAttribute(n, s)
                        ),
                    e && e.appendChild(i),
                    i
                );
            },
            y = (a) => {
                let { instances: t } = r;
                Object.values(t).forEach((e) => e[a]());
            },
            b = class {
                id;
                promise;
                telInput;
                highlightedItem;
                options;
                hadInitialPlaceholder;
                isRTL;
                selectedCountryData;
                countries;
                dialCodeMaxLen;
                dialCodeToIso2Map;
                dialCodes;
                countryContainer;
                selectedCountry;
                selectedCountryInner;
                selectedCountryA11yText;
                selectedDialCode;
                dropdownArrow;
                dropdownContent;
                searchInput;
                searchResultsA11yText;
                countryList;
                dropdown;
                hiddenInput;
                hiddenInputCountry;
                maxCoreNumberLength;
                defaultCountry;
                _a14;
                _a9;
                _a10;
                _a11;
                _a12;
                _handleKeydownEvent;
                _a4;
                _a0;
                _a1;
                _a2;
                _a3;
                _a7;
                resolveAutoCountryPromise;
                rejectAutoCountryPromise;
                resolveUtilsScriptPromise;
                rejectUtilsScriptPromise;
                constructor(t, e = {}) {
                    (this.id = O++),
                        (this.a = t),
                        (this.c = null),
                        (this.d = Object.assign({}, N, e)),
                        (this.e = !!t.getAttribute("placeholder"));
                }
                _init() {
                    this.d.useFullscreenPopup && (this.d.fixDropdownWidth = !1),
                        this.d.separateDialCode &&
                            ((this.d.allowDropdown = !0),
                            (this.d.nationalMode = !1)),
                        !this.d.showFlags &&
                            !this.d.separateDialCode &&
                            (this.d.nationalMode = !1),
                        this.d.useFullscreenPopup &&
                            !this.d.dropdownContainer &&
                            (this.d.dropdownContainer = document.body),
                        (this.isRTL = !!this.a.closest("[dir=rtl]")),
                        (this.d.i18n = { ...E, ...this.d.i18n });
                    let t = new Promise((i, n) => {
                            (this.h = i), (this.i = n);
                        }),
                        e = new Promise((i, n) => {
                            (this.i0 = i), (this.i1 = n);
                        });
                    (this.promise = Promise.all([t, e])),
                        (this.s = {}),
                        this._b(),
                        this._f(),
                        this._h(),
                        this._i(),
                        this._i3();
                }
                _b() {
                    this._d(),
                        this._d2(),
                        this._d0(),
                        this.d.countryOrder &&
                            (this.d.countryOrder = this.d.countryOrder.map(
                                (t) => t.toLowerCase()
                            )),
                        this._sortCountries();
                }
                _sortCountries() {
                    this.p.sort((t, e) => {
                        let { countryOrder: i } = this.d;
                        if (i) {
                            let n = i.indexOf(t.iso2),
                                s = i.indexOf(e.iso2),
                                o = n > -1,
                                l = s > -1;
                            if (o || l) return o && l ? n - s : o ? -1 : 1;
                        }
                        return t.name < e.name ? -1 : t.name > e.name ? 1 : 0;
                    });
                }
                _c(t, e, i) {
                    e.length > this.dialCodeMaxLen &&
                        (this.dialCodeMaxLen = e.length),
                        this.q.hasOwnProperty(e) || (this.q[e] = []);
                    for (let s = 0; s < this.q[e].length; s++)
                        if (this.q[e][s] === t) return;
                    let n = i !== void 0 ? i : this.q[e].length;
                    this.q[e][n] = t;
                }
                _d() {
                    let { onlyCountries: t, excludeCountries: e } = this.d;
                    if (t.length) {
                        let i = t.map((n) => n.toLowerCase());
                        this.p = C.filter((n) => i.indexOf(n.iso2) > -1);
                    } else if (e.length) {
                        let i = e.map((n) => n.toLowerCase());
                        this.p = C.filter((n) => i.indexOf(n.iso2) === -1);
                    } else this.p = C;
                }
                _d0() {
                    for (let t = 0; t < this.p.length; t++) {
                        let e = this.p[t].iso2.toLowerCase();
                        this.d.i18n.hasOwnProperty(e) &&
                            (this.p[t].name = this.d.i18n[e]);
                    }
                }
                _d2() {
                    (this.dialCodes = {}),
                        (this.dialCodeMaxLen = 0),
                        (this.q = {});
                    for (let t = 0; t < this.p.length; t++) {
                        let e = this.p[t];
                        this.dialCodes[e.dialCode] ||
                            (this.dialCodes[e.dialCode] = !0),
                            this._c(e.iso2, e.dialCode, e.priority);
                    }
                    for (let t = 0; t < this.p.length; t++) {
                        let e = this.p[t];
                        if (e.areaCodes) {
                            let i = this.q[e.dialCode][0];
                            for (let n = 0; n < e.areaCodes.length; n++) {
                                let s = e.areaCodes[n];
                                for (let o = 1; o < s.length; o++) {
                                    let l = e.dialCode + s.substr(0, o);
                                    this._c(i, l), this._c(e.iso2, l);
                                }
                                this._c(e.iso2, e.dialCode + s);
                            }
                        }
                    }
                }
                _f() {
                    this.a.classList.add("iti__tel-input"),
                        !this.a.hasAttribute("autocomplete") &&
                            !(
                                this.a.form &&
                                this.a.form.hasAttribute("autocomplete")
                            ) &&
                            this.a.setAttribute("autocomplete", "off");
                    let {
                            allowDropdown: t,
                            separateDialCode: e,
                            showFlags: i,
                            containerClass: n,
                            hiddenInput: s,
                            dropdownContainer: o,
                            fixDropdownWidth: l,
                            useFullscreenPopup: d,
                            i18n: u,
                        } = this.d,
                        c = "iti";
                    t && (c += " iti--allow-dropdown"),
                        i && (c += " iti--show-flags"),
                        n && (c += ` ${n}`),
                        d || (c += " iti--inline-dropdown");
                    let p = h("div", { class: c });
                    if ((this.a.parentNode?.insertBefore(p, this.a), t || i)) {
                        (this.k = h(
                            "div",
                            { class: "iti__country-container" },
                            p
                        )),
                            (this.selectedCountry = h(
                                "button",
                                {
                                    type: "button",
                                    class: "iti__selected-country",
                                    ...(t && {
                                        "aria-expanded": "false",
                                        "aria-label":
                                            this.d.i18n
                                                .selectedCountryAriaLabel,
                                        "aria-haspopup": "true",
                                        "aria-controls": `iti-${this.id}__dropdown-content`,
                                        role: "combobox",
                                    }),
                                },
                                this.k
                            ));
                        let g = h(
                            "div",
                            { class: "iti__selected-country-primary" },
                            this.selectedCountry
                        );
                        if (
                            ((this.l = h("div", null, g)),
                            (this.selectedCountryA11yText = h(
                                "span",
                                { class: "iti__a11y-text" },
                                this.l
                            )),
                            this.a.disabled
                                ? this.selectedCountry.setAttribute(
                                      "aria-disabled",
                                      "true"
                                  )
                                : this.selectedCountry.setAttribute(
                                      "tabindex",
                                      "0"
                                  ),
                            t &&
                                (this.u = h(
                                    "div",
                                    {
                                        class: "iti__arrow",
                                        "aria-hidden": "true",
                                    },
                                    g
                                )),
                            e &&
                                (this.t = h(
                                    "div",
                                    { class: "iti__selected-dial-code" },
                                    this.selectedCountry
                                )),
                            t)
                        ) {
                            let m = l ? "" : "iti--flexible-dropdown-width";
                            if (
                                ((this.dropdownContent = h("div", {
                                    id: `iti-${this.id}__dropdown-content`,
                                    class: `iti__dropdown-content iti__hide ${m}`,
                                })),
                                (this.searchInput = h(
                                    "input",
                                    {
                                        type: "text",
                                        class: "iti__search-input",
                                        placeholder: u.searchPlaceholder,
                                        role: "combobox",
                                        "aria-expanded": "true",
                                        "aria-label": u.searchPlaceholder,
                                        "aria-controls": `iti-${this.id}__country-listbox`,
                                        "aria-autocomplete": "list",
                                        autocomplete: "off",
                                    },
                                    this.dropdownContent
                                )),
                                (this.searchResultsA11yText = h(
                                    "span",
                                    { class: "iti__a11y-text" },
                                    this.dropdownContent
                                )),
                                (this.countryList = h(
                                    "ul",
                                    {
                                        class: "iti__country-list",
                                        id: `iti-${this.id}__country-listbox`,
                                        role: "listbox",
                                        "aria-label": u.countryListAriaLabel,
                                    },
                                    this.dropdownContent
                                )),
                                this._g(this.p, "iti__standard"),
                                this._p4(),
                                o)
                            ) {
                                let v = "iti iti--container";
                                d
                                    ? (v += " iti--fullscreen-popup")
                                    : (v += " iti--inline-dropdown"),
                                    (this.dropdown = h("div", { class: v })),
                                    this.dropdown.appendChild(
                                        this.dropdownContent
                                    );
                            } else this.k.appendChild(this.dropdownContent);
                        }
                    }
                    if ((p.appendChild(this.a), s)) {
                        let g = this.a.getAttribute("name") || "",
                            m = s(g);
                        m.phone &&
                            ((this.hiddenInput = h("input", {
                                type: "hidden",
                                name: m.phone,
                            })),
                            p.appendChild(this.hiddenInput)),
                            m.country &&
                                ((this.hiddenInputCountry = h("input", {
                                    type: "hidden",
                                    name: m.country,
                                })),
                                p.appendChild(this.hiddenInputCountry));
                    }
                }
                _g(t, e) {
                    for (let i = 0; i < t.length; i++) {
                        let n = t[i],
                            s = h(
                                "li",
                                {
                                    id: `iti-${this.id}__item-${n.iso2}`,
                                    class: `iti__country ${e}`,
                                    tabindex: "-1",
                                    role: "option",
                                    "data-dial-code": n.dialCode,
                                    "data-country-code": n.iso2,
                                    "aria-selected": "false",
                                },
                                this.countryList
                            );
                        n.nodeById[this.id] = s;
                        let o = "";
                        this.d.showFlags &&
                            (o += `<div class='iti__flag-box'><div class='iti__flag iti__${n.iso2}'></div></div>`),
                            (o += `<span class='iti__country-name'>${n.name}</span>`),
                            (o += `<span class='iti__dial-code'>+${n.dialCode}</span>`),
                            s.insertAdjacentHTML("beforeend", o);
                    }
                }
                _h(t = !1) {
                    let e = this.a.getAttribute("value"),
                        i = this.a.value,
                        s =
                            e &&
                            e.charAt(0) === "+" &&
                            (!i || i.charAt(0) !== "+")
                                ? e
                                : i,
                        o = this._5(s),
                        l = k(s),
                        { initialCountry: d } = this.d;
                    if (o && !l) this._v(s);
                    else if (d !== "auto" || t) {
                        let u = d ? d.toLowerCase() : "";
                        u && this._y(u, !0)
                            ? this._z(u)
                            : o && l
                            ? this._z("us")
                            : this._z();
                    }
                    s && this._u(s);
                }
                _i() {
                    this._j(),
                        this.d.allowDropdown && this._i2(),
                        (this.hiddenInput || this.hiddenInputCountry) &&
                            this.a.form &&
                            this._i0();
                }
                _i0() {
                    (this._a14 = () => {
                        this.hiddenInput &&
                            (this.hiddenInput.value = this.getNumber()),
                            this.hiddenInputCountry &&
                                (this.hiddenInputCountry.value =
                                    this.getSelectedCountryData().iso2 || "");
                    }),
                        this.a.form?.addEventListener("submit", this._a14);
                }
                _i2() {
                    this._a9 = (e) => {
                        this.dropdownContent.classList.contains("iti__hide")
                            ? this.a.focus()
                            : e.preventDefault();
                    };
                    let t = this.a.closest("label");
                    t && t.addEventListener("click", this._a9),
                        (this._a10 = () => {
                            this.dropdownContent.classList.contains(
                                "iti__hide"
                            ) &&
                                !this.a.disabled &&
                                !this.a.readOnly &&
                                this._n();
                        }),
                        this.selectedCountry.addEventListener(
                            "click",
                            this._a10
                        ),
                        (this._a11 = (e) => {
                            this.dropdownContent.classList.contains(
                                "iti__hide"
                            ) &&
                                ["ArrowUp", "ArrowDown", " ", "Enter"].includes(
                                    e.key
                                ) &&
                                (e.preventDefault(),
                                e.stopPropagation(),
                                this._n()),
                                e.key === "Tab" && this._2();
                        }),
                        this.k.addEventListener("keydown", this._a11);
                }
                _i3() {
                    this.d.utilsScript && !r.utils
                        ? r.documentReady()
                            ? r.loadUtils(this.d.utilsScript)
                            : window.addEventListener("load", () => {
                                  r.loadUtils(this.d.utilsScript);
                              })
                        : this.i0(),
                        this.d.initialCountry === "auto" && !this.s.iso2
                            ? this._i4()
                            : this.h();
                }
                _i4() {
                    r.autoCountry
                        ? this.handleAutoCountry()
                        : r.startedLoadingAutoCountry ||
                          ((r.startedLoadingAutoCountry = !0),
                          typeof this.d.geoIpLookup == "function" &&
                              this.d.geoIpLookup(
                                  (t = "") => {
                                      let e = t.toLowerCase();
                                      e && this._y(e, !0)
                                          ? ((r.autoCountry = e),
                                            setTimeout(() =>
                                                y("handleAutoCountry")
                                            ))
                                          : (this._h(!0),
                                            y("rejectAutoCountryPromise"));
                                  },
                                  () => {
                                      this._h(!0),
                                          y("rejectAutoCountryPromise");
                                  }
                              ));
                }
                _j() {
                    let {
                            strictMode: t,
                            formatAsYouType: e,
                            separateDialCode: i,
                        } = this.d,
                        n = !1;
                    (this._a12 = (s) => {
                        this._v(this.a.value) && this._8();
                        let o = s && s.data && /[^+0-9]/.test(s.data),
                            l =
                                s &&
                                s.inputType === "insertFromPaste" &&
                                this.a.value;
                        if (
                            (o || (l && !t)
                                ? (n = !0)
                                : /[^+0-9]/.test(this.a.value) || (n = !1),
                            e && !n)
                        ) {
                            let d = this.a.selectionStart || 0,
                                c = this.a.value
                                    .substring(0, d)
                                    .replace(/[^+0-9]/g, "").length,
                                p = s && s.inputType === "deleteContentForward",
                                g = this._9(),
                                m = z(c, g, d, p);
                            (this.a.value = g), this.a.setSelectionRange(m, m);
                        }
                    }),
                        this.a.addEventListener("input", this._a12),
                        (t || i) &&
                            ((this._handleKeydownEvent = (s) => {
                                if (
                                    s.key &&
                                    s.key.length === 1 &&
                                    !s.altKey &&
                                    !s.ctrlKey &&
                                    !s.metaKey
                                ) {
                                    if (i && s.key === "+") {
                                        s.preventDefault(),
                                            this._n(),
                                            (this.searchInput.value = "+"),
                                            this._p3("", !0);
                                        return;
                                    }
                                    if (t) {
                                        let o =
                                                this.a.selectionStart === 0 &&
                                                s.key === "+",
                                            l = /^[0-9]$/.test(s.key),
                                            d = o || l,
                                            u = this._6(),
                                            c = r.utils.getCoreNumber(
                                                u,
                                                this.s.iso2
                                            ),
                                            p =
                                                this.maxCoreNumberLength &&
                                                c.length >=
                                                    this.maxCoreNumberLength;
                                        (!d || p) && s.preventDefault();
                                    }
                                }
                            }),
                            this.a.addEventListener(
                                "keydown",
                                this._handleKeydownEvent
                            ));
                }
                _j2(t) {
                    let e = parseInt(
                        this.a.getAttribute("maxlength") || "",
                        10
                    );
                    return e && t.length > e ? t.substr(0, e) : t;
                }
                _trigger(t) {
                    let e = new Event(t, { bubbles: !0, cancelable: !0 });
                    this.a.dispatchEvent(e);
                }
                _n() {
                    let { fixDropdownWidth: t } = this.d;
                    t &&
                        (this.dropdownContent.style.width = `${this.a.offsetWidth}px`),
                        this.dropdownContent.classList.remove("iti__hide"),
                        this.selectedCountry.setAttribute(
                            "aria-expanded",
                            "true"
                        ),
                        this._o();
                    let e = this.countryList.firstElementChild;
                    e && (this._x(e, !1), (this.countryList.scrollTop = 0)),
                        this.searchInput.focus(),
                        this._p(),
                        this.u.classList.add("iti__arrow--up"),
                        this._trigger("open:countrydropdown");
                }
                _o() {
                    if (
                        (this.d.dropdownContainer &&
                            this.d.dropdownContainer.appendChild(this.dropdown),
                        !this.d.useFullscreenPopup)
                    ) {
                        let t = this.a.getBoundingClientRect(),
                            e = this.a.offsetHeight;
                        this.d.dropdownContainer &&
                            ((this.dropdown.style.top = `${t.top + e}px`),
                            (this.dropdown.style.left = `${t.left}px`),
                            (this._a4 = () => this._2()),
                            window.addEventListener("scroll", this._a4));
                    }
                }
                _p() {
                    (this._a0 = (n) => {
                        let s = n.target?.closest(".iti__country");
                        s && this._x(s, !1);
                    }),
                        this.countryList.addEventListener(
                            "mouseover",
                            this._a0
                        ),
                        (this._a1 = (n) => {
                            let s = n.target?.closest(".iti__country");
                            s && this._1(s);
                        }),
                        this.countryList.addEventListener("click", this._a1);
                    let t = !0;
                    (this._a2 = () => {
                        t || this._2(), (t = !1);
                    }),
                        document.documentElement.addEventListener(
                            "click",
                            this._a2
                        ),
                        (this._a3 = (n) => {
                            [
                                "ArrowUp",
                                "ArrowDown",
                                "Enter",
                                "Escape",
                            ].includes(n.key) &&
                                (n.preventDefault(),
                                n.stopPropagation(),
                                n.key === "ArrowUp" || n.key === "ArrowDown"
                                    ? this._q(n.key)
                                    : n.key === "Enter"
                                    ? this._r()
                                    : n.key === "Escape" && this._2());
                        }),
                        document.addEventListener("keydown", this._a3);
                    let e = () => {
                            let n = this.searchInput.value.trim();
                            n ? this._p3(n) : this._p3("", !0);
                        },
                        i = null;
                    (this._a7 = () => {
                        i && clearTimeout(i),
                            (i = setTimeout(() => {
                                e(), (i = null);
                            }, 100));
                    }),
                        this.searchInput.addEventListener("input", this._a7),
                        this.searchInput.addEventListener("click", (n) =>
                            n.stopPropagation()
                        );
                }
                _p3(t, e = !1) {
                    let i = !0;
                    this.countryList.innerHTML = "";
                    let n = D(t);
                    for (let s = 0; s < this.p.length; s++) {
                        let o = this.p[s],
                            l = D(o.name),
                            d = `+${o.dialCode}`;
                        if (
                            e ||
                            l.includes(n) ||
                            d.includes(n) ||
                            o.iso2.includes(n)
                        ) {
                            let u = o.nodeById[this.id];
                            u && this.countryList.appendChild(u),
                                i && (this._x(u, !1), (i = !1));
                        }
                    }
                    i && this._x(null, !1),
                        (this.countryList.scrollTop = 0),
                        this._p4();
                }
                _p4() {
                    let { i18n: t } = this.d,
                        e = this.countryList.childElementCount,
                        i;
                    e === 0
                        ? (i = t.zeroSearchResults)
                        : e === 1
                        ? (i = t.oneSearchResult)
                        : (i = t.multipleSearchResults.replace(
                              "${count}",
                              e.toString()
                          )),
                        (this.searchResultsA11yText.textContent = i);
                }
                _q(t) {
                    let e =
                        t === "ArrowUp"
                            ? this.c?.previousElementSibling
                            : this.c?.nextElementSibling;
                    !e &&
                        this.countryList.childElementCount > 1 &&
                        (e =
                            t === "ArrowUp"
                                ? this.countryList.lastElementChild
                                : this.countryList.firstElementChild),
                        e && (this._3(e), this._x(e, !1));
                }
                _r() {
                    this.c && this._1(this.c);
                }
                _u(t) {
                    let e = t;
                    if (this.d.formatOnDisplay && r.utils && this.s) {
                        let i =
                                this.d.nationalMode ||
                                (e.charAt(0) !== "+" &&
                                    !this.d.separateDialCode),
                            { NATIONAL: n, INTERNATIONAL: s } =
                                r.utils.numberFormat,
                            o = i ? n : s;
                        e = r.utils.formatNumber(e, this.s.iso2, o);
                    }
                    (e = this._7(e)), (this.a.value = e);
                }
                _v(t) {
                    let e = t.indexOf("+"),
                        i = e ? t.substring(e) : t,
                        n = this.s.dialCode;
                    i &&
                        n === "1" &&
                        i.charAt(0) !== "+" &&
                        (i.charAt(0) !== "1" && (i = `1${i}`), (i = `+${i}`)),
                        this.d.separateDialCode &&
                            n &&
                            i.charAt(0) !== "+" &&
                            (i = `+${n}${i}`);
                    let o = this._5(i, !0),
                        l = f(i),
                        d = null;
                    if (o) {
                        let u = this.q[f(o)],
                            c =
                                u.indexOf(this.s.iso2) !== -1 &&
                                l.length <= o.length - 1;
                        if (!(n === "1" && k(l)) && !c) {
                            for (let g = 0; g < u.length; g++)
                                if (u[g]) {
                                    d = u[g];
                                    break;
                                }
                        }
                    } else
                        i.charAt(0) === "+" && l.length
                            ? (d = "")
                            : (!i || i === "+") && !this.s.iso2 && (d = this.j);
                    return d !== null ? this._z(d) : !1;
                }
                _x(t, e) {
                    let i = this.c;
                    if (
                        (i &&
                            (i.classList.remove("iti__highlight"),
                            i.setAttribute("aria-selected", "false")),
                        (this.c = t),
                        this.c)
                    ) {
                        this.c.classList.add("iti__highlight"),
                            this.c.setAttribute("aria-selected", "true");
                        let n = this.c.getAttribute("id") || "";
                        this.selectedCountry.setAttribute(
                            "aria-activedescendant",
                            n
                        ),
                            this.searchInput.setAttribute(
                                "aria-activedescendant",
                                n
                            );
                    }
                    e && this.c.focus();
                }
                _y(t, e) {
                    for (let i = 0; i < this.p.length; i++)
                        if (this.p[i].iso2 === t) return this.p[i];
                    if (e) return null;
                    throw new Error(`No country data for '${t}'`);
                }
                _z(t) {
                    let { separateDialCode: e, showFlags: i, i18n: n } = this.d,
                        s = this.s.iso2 ? this.s : {};
                    if (
                        ((this.s = t ? this._y(t, !1) || {} : {}),
                        this.s.iso2 && (this.j = this.s.iso2),
                        this.l)
                    ) {
                        let o = "",
                            l = "";
                        t && i
                            ? ((o = `iti__flag iti__${t}`),
                              (l = `${this.s.name} +${this.s.dialCode}`))
                            : ((o = "iti__flag iti__globe"),
                              (l = n.noCountrySelected)),
                            (this.l.className = o),
                            (this.selectedCountryA11yText.textContent = l);
                    }
                    if ((this._z3(t, e), e)) {
                        let o = this.s.dialCode ? `+${this.s.dialCode}` : "";
                        this.t.innerHTML = o;
                        let d =
                            (this.selectedCountry.offsetWidth || this._z2()) +
                            8;
                        this.isRTL
                            ? (this.a.style.paddingRight = `${d}px`)
                            : (this.a.style.paddingLeft = `${d}px`);
                    }
                    return this._0(), this._updateMaxLength(), s.iso2 !== t;
                }
                _updateMaxLength() {
                    if (this.d.strictMode && r.utils)
                        if (this.s.iso2) {
                            let t =
                                    r.utils.numberType[
                                        this.d.placeholderNumberType
                                    ],
                                e = r.utils.getExampleNumber(
                                    this.s.iso2,
                                    !1,
                                    t,
                                    !0
                                ),
                                i = e;
                            for (; r.utils.isPossibleNumber(e, this.s.iso2); )
                                (i = e), (e += "0");
                            let n = r.utils.getCoreNumber(i, this.s.iso2);
                            this.maxCoreNumberLength = n.length;
                        } else this.maxCoreNumberLength = null;
                }
                _z3(t = null, e) {
                    if (!this.selectedCountry) return;
                    let i;
                    t && !e
                        ? (i = `${this.s.name}: +${this.s.dialCode}`)
                        : t
                        ? (i = this.s.name)
                        : (i = "Unknown"),
                        this.selectedCountry.setAttribute("title", i);
                }
                _z2() {
                    if (this.a.parentNode) {
                        let t = this.a.parentNode.cloneNode(!1);
                        (t.style.visibility = "hidden"),
                            document.body.appendChild(t);
                        let e = this.k.cloneNode();
                        t.appendChild(e);
                        let i = this.selectedCountry.cloneNode(!0);
                        e.appendChild(i);
                        let n = i.offsetWidth;
                        return document.body.removeChild(t), n;
                    }
                    return 0;
                }
                _0() {
                    let {
                            autoPlaceholder: t,
                            placeholderNumberType: e,
                            nationalMode: i,
                            customPlaceholder: n,
                        } = this.d,
                        s = t === "aggressive" || (!this.e && t === "polite");
                    if (r.utils && s) {
                        let o = r.utils.numberType[e],
                            l = this.s.iso2
                                ? r.utils.getExampleNumber(this.s.iso2, i, o)
                                : "";
                        (l = this._7(l)),
                            typeof n == "function" && (l = n(l, this.s)),
                            this.a.setAttribute("placeholder", l);
                    }
                }
                _1(t) {
                    let e = this._z(t.getAttribute("data-country-code"));
                    this._2(),
                        this._4(t.getAttribute("data-dial-code")),
                        this.a.focus(),
                        e && this._8();
                }
                _2() {
                    this.dropdownContent.classList.add("iti__hide"),
                        this.selectedCountry.setAttribute(
                            "aria-expanded",
                            "false"
                        ),
                        this.selectedCountry.removeAttribute(
                            "aria-activedescendant"
                        ),
                        this.c && this.c.setAttribute("aria-selected", "false"),
                        this.searchInput.removeAttribute(
                            "aria-activedescendant"
                        ),
                        this.u.classList.remove("iti__arrow--up"),
                        document.removeEventListener("keydown", this._a3),
                        this.searchInput.removeEventListener("input", this._a7),
                        document.documentElement.removeEventListener(
                            "click",
                            this._a2
                        ),
                        this.countryList.removeEventListener(
                            "mouseover",
                            this._a0
                        ),
                        this.countryList.removeEventListener("click", this._a1),
                        this.d.dropdownContainer &&
                            (this.d.useFullscreenPopup ||
                                window.removeEventListener("scroll", this._a4),
                            this.dropdown.parentNode &&
                                this.dropdown.parentNode.removeChild(
                                    this.dropdown
                                )),
                        this._trigger("close:countrydropdown");
                }
                _3(t) {
                    let e = this.countryList,
                        i = document.documentElement.scrollTop,
                        n = e.offsetHeight,
                        s = e.getBoundingClientRect().top + i,
                        o = s + n,
                        l = t.offsetHeight,
                        d = t.getBoundingClientRect().top + i,
                        u = d + l,
                        c = d - s + e.scrollTop;
                    if (d < s) e.scrollTop = c;
                    else if (u > o) {
                        let p = n - l;
                        e.scrollTop = c - p;
                    }
                }
                _4(t) {
                    let e = this.a.value,
                        i = `+${t}`,
                        n;
                    if (e.charAt(0) === "+") {
                        let s = this._5(e);
                        s ? (n = e.replace(s, i)) : (n = i), (this.a.value = n);
                    }
                }
                _5(t, e) {
                    let i = "";
                    if (t.charAt(0) === "+") {
                        let n = "";
                        for (let s = 0; s < t.length; s++) {
                            let o = t.charAt(s);
                            if (!isNaN(parseInt(o, 10))) {
                                if (((n += o), e))
                                    this.q[n] && (i = t.substr(0, s + 1));
                                else if (this.dialCodes[n]) {
                                    i = t.substr(0, s + 1);
                                    break;
                                }
                                if (n.length === this.dialCodeMaxLen) break;
                            }
                        }
                    }
                    return i;
                }
                _6() {
                    let t = this.a.value.trim(),
                        { dialCode: e } = this.s,
                        i,
                        n = f(t);
                    return (
                        this.d.separateDialCode && t.charAt(0) !== "+" && e && n
                            ? (i = `+${e}`)
                            : (i = ""),
                        i + t
                    );
                }
                _7(t) {
                    let e = t;
                    if (this.d.separateDialCode) {
                        let i = this._5(e);
                        if (i) {
                            i = `+${this.s.dialCode}`;
                            let n =
                                e[i.length] === " " || e[i.length] === "-"
                                    ? i.length + 1
                                    : i.length;
                            e = e.substr(n);
                        }
                    }
                    return this._j2(e);
                }
                _8() {
                    this._trigger("countrychange");
                }
                _9() {
                    let t = this._6(),
                        e = r.utils
                            ? r.utils.formatNumberAsYouType(t, this.s.iso2)
                            : t,
                        { dialCode: i } = this.s;
                    return this.d.separateDialCode &&
                        this.a.value.charAt(0) !== "+" &&
                        e.includes(`+${i}`)
                        ? (e.split(`+${i}`)[1] || "").trim()
                        : e;
                }
                handleAutoCountry() {
                    this.d.initialCountry === "auto" &&
                        r.autoCountry &&
                        ((this.j = r.autoCountry),
                        this.a.value || this.setCountry(this.j),
                        this.h());
                }
                handleUtils() {
                    r.utils &&
                        (this.a.value && this._u(this.a.value),
                        this.s.iso2 && (this._0(), this._updateMaxLength())),
                        this.i0();
                }
                destroy() {
                    if (this.d.allowDropdown) {
                        this._2(),
                            this.selectedCountry.removeEventListener(
                                "click",
                                this._a10
                            ),
                            this.k.removeEventListener("keydown", this._a11);
                        let i = this.a.closest("label");
                        i && i.removeEventListener("click", this._a9);
                    }
                    let { form: t } = this.a;
                    this._a14 &&
                        t &&
                        t.removeEventListener("submit", this._a14),
                        this.a.removeEventListener("input", this._a12),
                        this._handleKeydownEvent &&
                            this.a.removeEventListener(
                                "keydown",
                                this._handleKeydownEvent
                            ),
                        this.a.removeAttribute("data-intl-tel-input-id");
                    let e = this.a.parentNode;
                    e?.parentNode?.insertBefore(this.a, e),
                        e?.parentNode?.removeChild(e),
                        delete r.instances[this.id];
                }
                getExtension() {
                    return r.utils
                        ? r.utils.getExtension(this._6(), this.s.iso2)
                        : "";
                }
                getNumber(t) {
                    if (r.utils) {
                        let { iso2: e } = this.s;
                        return r.utils.formatNumber(this._6(), e, t);
                    }
                    return "";
                }
                getNumberType() {
                    return r.utils
                        ? r.utils.getNumberType(this._6(), this.s.iso2)
                        : -99;
                }
                getSelectedCountryData() {
                    return this.s;
                }
                getValidationError() {
                    if (r.utils) {
                        let { iso2: t } = this.s;
                        return r.utils.getValidationError(this._6(), t);
                    }
                    return -99;
                }
                isValidNumber(t = !0) {
                    let e = this._6();
                    return /\p{L}/u.test(e)
                        ? !1
                        : r.utils
                        ? r.utils.isPossibleNumber(e, this.s.iso2, t)
                        : null;
                }
                isValidNumberPrecise() {
                    let t = this._6();
                    return /\p{L}/u.test(t)
                        ? !1
                        : r.utils
                        ? r.utils.isValidNumber(t, this.s.iso2)
                        : null;
                }
                setCountry(t) {
                    let e = t.toLowerCase();
                    this.s.iso2 !== e &&
                        (this._z(e), this._4(this.s.dialCode), this._8());
                }
                setNumber(t) {
                    let e = this._v(t);
                    this._u(t), e && this._8();
                }
                setPlaceholderNumberType(t) {
                    (this.d.placeholderNumberType = t), this._0();
                }
            },
            j = (a, t, e) => {
                let i = document.createElement("script");
                (i.onload = () => {
                    window.intlTelInputUtils &&
                        ((r.utils = window.intlTelInputUtils),
                        delete window.intlTelInputUtils,
                        window.intlTelInputUtilsBackup &&
                            ((window.intlTelInputUtils =
                                window.intlTelInputUtilsBackup),
                            delete window.intlTelInputUtilsBackup)),
                        y("handleUtils"),
                        t && t();
                }),
                    (i.onerror = () => {
                        y("rejectUtilsScriptPromise"), e && e();
                    }),
                    (i.className = "iti-load-utils"),
                    (i.async = !0),
                    (i.src = a),
                    document.body.appendChild(i);
            },
            B = (a) =>
                !r.utils && !r.startedLoadingUtilsScript
                    ? ((r.startedLoadingUtilsScript = !0),
                      new Promise((t, e) => j(a, t, e)))
                    : null,
            r = Object.assign(
                (a, t) => {
                    let e = new b(a, t);
                    return (
                        e._init(),
                        a.setAttribute(
                            "data-intl-tel-input-id",
                            e.id.toString()
                        ),
                        (r.instances[e.id] = e),
                        e
                    );
                },
                {
                    defaults: N,
                    documentReady: () => document.readyState === "complete",
                    getCountryData: () => C,
                    getInstance: (a) => {
                        let t = a.getAttribute("data-intl-tel-input-id");
                        return t ? r.instances[t] : null;
                    },
                    instances: {},
                    loadUtils: B,
                    version: "22.0.2",
                }
            ),
            U = r;
        return H(F);
    })();

    // UMD
    return factoryOutput.default;
});
