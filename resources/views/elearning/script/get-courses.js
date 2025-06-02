const baseUrl = import.meta.env.VITE_API_BASE_URL;

function getToken() {
  return localStorage.getItem('token');
}

export async function fetchCourses() {
  const token = getToken();
  if (!token) {
    console.error("❌ Token tidak ditemukan di localStorage.");
    return;
  }

  try {
    const response = await axios.get(`${baseUrl}/courses`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });

    const courses = response.data;
    console.log("✅ Data courses berhasil diambil:", courses);

    // Contoh: tampilkan nama course ke dalam elemen HTML jika ada
    const container = document.getElementById("course-list");
    if (container) {
      container.innerHTML = "";
      courses.forEach(course => {
        const item = document.createElement("div");
        item.innerHTML = `
          <div class="border rounded p-3 mb-2 shadow">
            <h2 class="text-lg font-bold">${course.name}</h2>
            <p class="text-sm text-gray-600">${course.descriptionHeading}</p>
            <p>${course.description}</p>
            <small class="text-gray-500">${course.section} - ${course.room}</small>
            <br>
            <a href="${course.alternateLink}" class="text-blue-500" target="_blank">Buka Classroom</a>
          </div>
        `;
        container.appendChild(item);
      });
    }

  } catch (error) {
    console.error("❌ Gagal mengambil data courses:", error.response?.data || error.message);
  }
}
