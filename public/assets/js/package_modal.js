const packages = {
  klein: {
    title: "Klein Umzugspaket",
    subtitle: "Für kleine Umzüge",
    details: "Bis 20m³ – 3 Stunden inklusive",
    description:
      "Dieses Paket eignet sich ideal für 1-Zimmer-Wohnungen, Studentenwohnungen, kleine Büros oder Teilumzüge. Wir übernehmen den kompletten Transport inklusive fachgerechtem Be- und Entladen sowie der sicheren Beförderung Ihres Umzugsguts.",
    features: [
      "Transportfahrzeug inkl. Kraftstoffkosten",
      "3 erfahrene Umzugshelfer",
      "Fachgerechtes Be- und Entladen",
      "Demontage und Montage von Standardmöbeln",
      "Bereitstellung von Umzugsdecken und Schutzmaterial",
      "Transportsicherung gemäß gesetzlichen Vorgaben",
      "Grundversicherung Ihres Umzugsgutes",
      "3 Std. Arbeitszeit inklusive (jede weitere Stunde 65€*)",
    ],
    price: "ab 449€* ",
    priceDetails:
      "*Alle Preise enthalten keine MwSt. Für individuelle Angebote oder spezielle Anforderungen kontaktieren Sie uns bitte direkt.",
  },

  mittel: {
    title: "Mittel Umzugspaket",
    subtitle: "Für mittlere Umzüge",
    details: "Bis 40m³ – 6 Stunden inklusive",
    description:
      "Optimal für 2–3 Zimmer Wohnungen oder kleinere Firmenumzüge. Dieses Paket bietet ausreichend Kapazität und Zeit für einen strukturierten, sicheren und stressfreien Umzug mit professioneller Durchführung.",
    features: [
      "Großes Transportfahrzeug inkl. Kraftstoff",
      "3 qualifizierte Umzugsprofis",
      "Kompletter Möbeltransport inkl. Sicherung",
      "Ab- und Aufbau von Möbeln (Schränke, Betten, Regale)",
      "Schutzmaterialien wie Umzugsdecken und Stretchfolie",
      "Fachgerechtes Be- und Entladen",
      "Versicherungsschutz für den gesamten Transport",
      "6 Std. Arbeitszeit inklusive (jede weitere Stunde 65€*)",
    ],
    price: "ab 699€* ",
    priceDetails:
      "*Alle Preise enthalten keine MwSt. Für individuelle Angebote oder spezielle Anforderungen kontaktieren Sie uns bitte direkt.",
  },

  gross: {
    title: "Groß Umzugspaket",
    subtitle: "Für große Umzüge",
    details: "Bis 60m³ – 8 Stunden inklusive",
    description:
      "Die ideale Lösung für große Haushalte, Mehrfamilienwohnungen oder umfangreiche Firmenumzüge. Dieses Paket bietet maximale Kapazität, ausreichend Zeit sowie professionelle Organisation für einen reibungslosen Ablauf.",
    features: [
      "Geräumiges Transportfahrzeug inkl. Kraftstoff",
      "3 erfahrene Umzugsfachkräfte",
      "Komplette Umzugsabwicklung inklusive Planung",
      "Fachgerechter Ab- und Aufbau komplexer Möbel",
      "Sichere Verpackung und Transportschutz",
      "Professionelle Ladungssicherung",
      "Transportversicherung gemäß gesetzlichen Bestimmungen",
      "8 Std. Arbeitszeit inklusive (jede weitere Stunde 65€*)",
    ],
    price: "ab 999€* ",
    priceDetails:
      "*Alle Preise enthalten keine MwSt. Für individuelle Angebote oder spezielle Anforderungen kontaktieren Sie uns bitte direkt.",
  },
};

const modal = document.getElementById("pkgModal");

function openPackageModal(pkgKey) {
  const pkg = packages[pkgKey];

  document.getElementById("modalTitle").innerText = pkg.title;
  document.getElementById("modalSubtitle").innerText = pkg.subtitle;
  document.getElementById("modalDetails").innerText = pkg.details;
  document.getElementById("modalDescription").innerText = pkg.description;
  document.getElementById("modalPrice").innerText = pkg.price;
  document.getElementById("modalPriceDetails").innerText = pkg.priceDetails;

  const featuresList = document.getElementById("modalFeatures");
  featuresList.innerHTML = "";
  pkg.features.forEach((feature) => {
    const li = document.createElement("li");
    li.innerText = feature;
    featuresList.appendChild(li);
  });

  modal.classList.add("active");
}

document.getElementById("pkgModalClose").addEventListener("click", () => {
  modal.classList.remove("active");
});

document.querySelector(".pkg-modal-overlay").addEventListener("click", () => {
  modal.classList.remove("active");
});
