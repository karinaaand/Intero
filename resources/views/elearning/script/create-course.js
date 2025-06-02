const baseUrl = import.meta.env.VITE_API_BASE_URL;

function getToken() {
    return localStorage.getItem("token");
}

document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("create-course-form");
    if (!form) return;

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const token = getToken();
        if (!token) {
            console.error("Token tidak ditemukan");
            return;
        }

        const payload = {
            name: document.getElementById("name").value,
            section: document.getElementById("section").value,
            description_heading: document.getElementById("description_heading")
                .value,
            description: document.getElementById("description").value,
            room: document.getElementById("room").value,
        };

        try {
            const response = await axios.post(`${baseUrl}/courses`, payload, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            });

            console.log("✅ Course berhasil dibuat:", response.data);
            document.getElementById("create-status").innerText =
                "✅ Course berhasil dibuat!";
        } catch (error) {
            console.error(
                "❌ Gagal membuat course:",
                error.response?.data || error.message
            );
            document.getElementById("create-status").innerText =
                "❌ Gagal membuat course!";
        }
    });
});
