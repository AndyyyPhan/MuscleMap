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
  
    Object.keys(muscleMap).forEach(muscle => {
      const area = document.getElementById(muscle);
      if (area) {
        area.addEventListener("mouseenter", () => showHighlight(muscle));
        area.addEventListener("mouseleave", hideHighlight);
      } else {
        console.warn(`Could not find <area id="${muscle}">`);
      }
    });
    
  });  