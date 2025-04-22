document.addEventListener("DOMContentLoaded", () => {
    const highlight = document.getElementById("highlight");
  
    const muscleMap = {
      biceps: { x: 130, y: 150, w: 50, h: 50 },
      quads: { x: 200, y: 300, w: 50, h: 50 }
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
  });  