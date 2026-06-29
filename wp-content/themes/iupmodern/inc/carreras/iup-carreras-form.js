/**
 * Formulario "Agenda una cita" (single-carreras) IUP Sur.
 * - Toma el nombre de la carrera directamente del <h1> de la página
 *   y lo coloca en el campo oculto antes de enviar.
 * - Envío AJAX con respaldo sin-JS.
 * Requiere el objeto global IUP_KF (inyectado con wp_localize_script).
 */
(function () {
  "use strict";

  function ready(fn) {
    if (document.readyState !== "loading") {
      fn();
    } else {
      document.addEventListener("DOMContentLoaded", fn);
    }
  }

  ready(function () {
    var form = document.getElementById("iup-carreras-form");
    if (!form || typeof window.IUP_KF === "undefined") {
      return;
    }

    var statusBox = document.getElementById("iup-kf-status");
    var button = form.querySelector('button[type="submit"]');
    var buttonHtml = button ? button.innerHTML : "";
    var carreraInp = form.querySelector('[name="carrera"]');

    // Toma el texto del primer <h1> de la página (el título de la carrera).
    function syncCarreraFromH1() {
      if (!carreraInp) {
        return;
      }
      var h1 = document.querySelector("h1");
      if (h1) {
        var titulo = (h1.textContent || "").replace(/\s+/g, " ").trim();
        if (titulo) {
          carreraInp.value = titulo;
        }
      }
    }

    syncCarreraFromH1();

    function showStatus(type, message) {
      if (!statusBox) {
        window.alert(message);
        return;
      }
      statusBox.textContent = message;
      statusBox.className =
        "iup-kf-status mt-2 rounded-lg px-4 py-3 text-base font-medium text-left " +
        (type === "success"
          ? "bg-up-green/20 text-white border border-up-green/50"
          : "bg-red-500/15 text-red-200 border border-red-400/40");
      statusBox.hidden = false;
      statusBox.setAttribute("role", type === "success" ? "status" : "alert");
      statusBox.scrollIntoView({ behavior: "smooth", block: "center" });
    }

    function clearFieldErrors() {
      form.querySelectorAll("[data-iup-error]").forEach(function (el) {
        el.remove();
      });
      form.querySelectorAll(".iup-kf-invalid").forEach(function (el) {
        el.classList.remove(
          "iup-kf-invalid",
          "ring-1",
          "ring-red-400",
          "border-red-400",
        );
      });
    }

    function showFieldErrors(errors) {
      if (!errors) {
        return;
      }
      Object.keys(errors).forEach(function (name) {
        var field = form.querySelector('[name="' + name + '"]');
        if (!field) {
          return;
        }
        field.classList.add(
          "iup-kf-invalid",
          "ring-1",
          "ring-red-400",
          "border-red-400",
        );
        var msg = document.createElement("p");
        msg.setAttribute("data-iup-error", "1");
        msg.className = "text-sm text-red-300 mt-1";
        msg.textContent = errors[name];
        field.parentNode.appendChild(msg);
      });
    }

    function setLoading(loading) {
      if (!button) {
        return;
      }
      button.disabled = loading;
      button.classList.toggle("opacity-70", loading);
      button.classList.toggle("cursor-not-allowed", loading);
      button.innerHTML = loading ? "Enviando…" : buttonHtml;
      if (
        !loading &&
        window.lucide &&
        typeof window.lucide.createIcons === "function"
      ) {
        window.lucide.createIcons();
      }
    }

    form.addEventListener("submit", function (e) {
      e.preventDefault();
      clearFieldErrors();
      if (statusBox) {
        statusBox.hidden = true;
      }

      syncCarreraFromH1(); // asegura el valor de la carrera al momento de enviar

      var data = new FormData(form);
      data.set("action", window.IUP_KF.action);

      setLoading(true);

      fetch(window.IUP_KF.ajaxUrl, {
        method: "POST",
        credentials: "same-origin",
        body: data,
      })
        .then(function (r) {
          return r.json();
        })
        .then(function (res) {
          if (res && res.success) {
            showStatus(
              "success",
              (res.data && res.data.message) || "¡Datos enviados!",
            );
            form.reset();
            syncCarreraFromH1(); // reset borra el oculto: lo volvemos a poner
          } else {
            var d = (res && res.data) || {};
            showStatus(
              "error",
              d.message || "No se pudo enviar la información.",
            );
            showFieldErrors(d.errors);
          }
        })
        .catch(function () {
          showStatus("error", "Error de conexión. Inténtalo de nuevo.");
        })
        .finally(function () {
          setLoading(false);
        });
    });
  });
})();
