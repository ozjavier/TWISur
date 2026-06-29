/**
 * Quejas y Sugerencias IUP Sur — envío AJAX con respaldo sin-JS.
 * Requiere el objeto global IUP_QF (inyectado con wp_localize_script).
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
    var form = document.getElementById("iup-quejas-form");
    if (!form || typeof window.IUP_QF === "undefined") {
      return;
    }

    var statusBox = document.getElementById("iup-qf-status");
    var button = form.querySelector('button[type="submit"]');
    var buttonHtml = button ? button.innerHTML : "";

    function showStatus(type, message) {
      if (!statusBox) {
        window.alert(message);
        return;
      }
      statusBox.textContent = message;
      statusBox.className =
        "iup-qf-status rounded-xl px-4 py-3 text-base font-medium " +
        (type === "success"
          ? "bg-up-green/15 text-up-blue-dark border border-up-green/40"
          : "bg-red-50 text-red-700 border border-red-200");
      statusBox.hidden = false;
      statusBox.setAttribute("role", type === "success" ? "status" : "alert");
      statusBox.scrollIntoView({ behavior: "smooth", block: "center" });
    }

    function clearFieldErrors() {
      form.querySelectorAll("[data-iup-error]").forEach(function (el) {
        el.remove();
      });
      form.querySelectorAll(".iup-qf-invalid").forEach(function (el) {
        el.classList.remove(
          "iup-qf-invalid",
          "ring-2",
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
          "iup-qf-invalid",
          "ring-2",
          "ring-red-400",
          "border-red-400",
        );
        var msg = document.createElement("p");
        msg.setAttribute("data-iup-error", "1");
        msg.className = "text-sm text-red-600 mt-1";
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

      var data = new FormData(form);
      data.set("action", window.IUP_QF.action);

      setLoading(true);

      fetch(window.IUP_QF.ajaxUrl, {
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
              (res.data && res.data.message) || "¡Reporte enviado!",
            );
            form.reset();
          } else {
            var d = (res && res.data) || {};
            showStatus("error", d.message || "No se pudo enviar el reporte.");
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
