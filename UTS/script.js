const praktikumData = [
  { title: "Praktikum 1", desc: "HTML Dasar", link: "#" },
  { title: "Praktikum 2", desc: "Form Interaktif", link: "#" },
  { title: "Praktikum 3", desc: "Website Info", link: "#" },
  { title: "Praktikum 4", desc: "Kalkulator", link: "#" },
];

const tugasData = [
  { title: "Tugas 1", desc: "CV", link: "#" },
  { title: "Tugas 2", desc: "Form Interaktif", link: "#" },
  { title: "Tugas 3", desc: "Website", link: "#" },
  { title: "Tugas 4", desc: "Penghitung Nilai", link: "#" },
];

// Fungsi untuk membuat kartu
function createCards(data, containerId) {
  const container = document.getElementById(containerId);
  data.forEach(item => {
    const card = document.createElement("div");
    card.className = "card";
    card.innerHTML = `
      <h3><a href="${item.link}" target="_blank">${item.title}</a></h3>
      <p>${item.desc}</p>
    `;
    container.appendChild(card);
  });
}

// Panggil fungsi
createCards(praktikumData, "praktikumPBW");
createCards(tugasData, "tugasPBW");
