document.addEventListener("DOMContentLoaded", () => {
  const searchInput = document.getElementById("SearchInput");
  const featurettes = document.querySelectorAll(".row.featurette");
  const dividers = document.querySelectorAll("hr.featurette-divider");

  if (!searchInput) {
    console.error("Le champ de recherche (#SearchInput) est introuvable.");
    return;
  }
  if (featurettes.length === 0) {
    console.warn("Aucun élément avec la classe .row.featurette n'a été trouvé.");
    return;
  }

  searchInput.addEventListener("input", () => {
    const query = searchInput.value.toLowerCase();

    featurettes.forEach((featurette, index) => {
      const leadElements = featurette.querySelectorAll(".lead");
      let isMatch = false;

      leadElements.forEach((lead) => {
        if (lead.textContent.toLowerCase().includes(query)) {
          isMatch = true;
        }
      });

      if (isMatch) {
        featurette.classList.remove("hidden");
        if (dividers[index]) dividers[index].classList.remove("hidden");
      } else {
        featurette.classList.add("hidden");
        if (dividers[index]) dividers[index].classList.add("hidden");
      }
    });
  });
});
