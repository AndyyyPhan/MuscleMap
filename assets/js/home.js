document.addEventListener("DOMContentLoaded", () => {
    const highlight = document.getElementById("highlight");
  
    const muscleMap = {
      biceps: { x: 170, y: 130, w: 50, h: 50 },
      quads: { x: 130, y: 270, w: 50, h: 50 },
      triceps: { x: 270, y: 130, w: 50, h: 50},
      hamstrings: { x: 300, y: 270, w: 50, h: 50},
      calves: { x: 300, y: 350, w: 50, h: 50},
      back: { x: 330, y: 110, w: 50, h: 50},
      chest: { x: 100,y: 90, w: 50, h: 50}
    };
  
    function showHighlight(muscleId) {
      const data = muscleMap[muscleId];
      if (data) {
        highlight.style.left = data.x + "px";
        highlight.style.top = data.y + "px";
        highlight.style.width = data.w + "px";
        highlight.style.height = data.h + "px";
        highlight.style.display = "block";
      }
    }
  
    function hideHighlight() {
      highlight.style.display = "none";
    }
  
    document.querySelector("area#biceps").addEventListener("mouseenter", () => showHighlight("biceps"));
    document.querySelector("area#biceps").addEventListener("mouseleave", hideHighlight);
  
    document.querySelector("area#quads").addEventListener("mouseenter", () => showHighlight("quads"));
    document.querySelector("area#quads").addEventListener("mouseleave", hideHighlight);

    document.querySelector("area#triceps").addEventListener("mouseenter", () => showHighlight("triceps"));
    document.querySelector("area#triceps").addEventListener("mouseleave", hideHighlight);

    document.querySelector("area#hamstrings").addEventListener("mouseenter", () => showHighlight("hamstrings"));
    document.querySelector("area#hamstrings").addEventListener("mouseleave", hideHighlight);

    document.querySelector("area#calves").addEventListener("mouseenter", () => showHighlight("calves"));
    document.querySelector("area#calves").addEventListener("mouseleave", hideHighlight);

    document.querySelector("area#back").addEventListener("mouseenter", () => showHighlight("back"));
    document.querySelector("area#back").addEventListener("mouseleave", hideHighlight);

    document.querySelector("area#chest").addEventListener("mouseenter", () => showHighlight("chest"));
    document.querySelector("area#chest").addEventListener("mouseleave", hideHighlight);
  });  