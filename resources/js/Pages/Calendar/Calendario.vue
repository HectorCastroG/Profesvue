<script setup>
import { ref, computed, defineProps} from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
        sesion: Array,
        clases: Array

    });


const currentDate = ref(new Date());
const currentYear = computed(() => currentDate.value.getFullYear());
const currentMonth = computed(() => currentDate.value.getMonth());
const currentMonthName = computed(() => {
  const options = { month: 'long' };
  return currentDate.value.toLocaleDateString('es-ES', options);
});
const daysInMonth = computed(() => new Date(currentYear.value, currentMonth.value + 1, 0).getDate());

const calendarWeeks = computed(() => {
  const weeks = [];
  let week = [];
  let dayOfWeek = new Date(currentYear.value, currentMonth.value, 1).getDay() - 1;

  if (dayOfWeek === -1) {
    dayOfWeek = 6;
  }

  for (let i = 0; i < dayOfWeek; i++) {
    week.push('');
  }

  for (let i = 1; i <= daysInMonth.value; i++) {
    week.push(i);

    if (week.length === 7 || i === daysInMonth.value) {
      weeks.push(week);
      week = [];
    }
  }

  return weeks;
});

const popoverVisible = ref({});
const popoverPosition = ref({ x: 0, y: 0 });
const popoverSesiones = ref([]);

const sortedSesiones = computed(() => {
  return popoverSesiones.value.sort((a, b) => {
    // Comparar las horas de inicio
    if (a.horainicio < b.horainicio) return -1;
    if (a.horainicio > b.horainicio) return 1;
    return 0;
  });
});

const getDayClass = (day) => {
  if (
    day === new Date().getDate() &&
    currentMonth.value === new Date().getMonth() &&
    currentYear.value === new Date().getFullYear()
  ) {
    return 'current-day';
  }
  return '';
};

const openPopover = (day, event) => {
  event.stopPropagation();

  const clickedDate = new Date(currentYear.value, currentMonth.value, day - 1); // Ajuste de desfase: day + 1

  popoverVisible.value = { [day]: true };
  popoverPosition.value = { x: event.clientX, y: event.clientY };

  popoverSesiones.value = props.sesion.filter((sesion) => {
    const sesionDate = new Date(sesion.fecha);
    return sesionDate.getDate() === clickedDate.getDate() &&
           sesionDate.getMonth() === clickedDate.getMonth() &&
           sesionDate.getFullYear() === clickedDate.getFullYear();
  });
};

const closePopover = (day) => {
  event.stopPropagation();

  popoverVisible.value = { ...popoverVisible.value, [day]: false };
};

const closeAllPopovers = () => {
  popoverVisible.value = {};
};
const prevYear = () => {
  currentDate.value = new Date(currentYear.value - 1, currentMonth.value, 1);
};

const prevMonth = () => {
  currentDate.value = new Date(currentYear.value, currentMonth.value - 1, 1);
};

const nextMonth = () => {
  currentDate.value = new Date(currentYear.value, currentMonth.value + 1, 1);
};

const nextYear = () => {
  currentDate.value = new Date(currentYear.value + 1, currentMonth.value, 1);
};

document.addEventListener('click', (event) => {
  const clickedInsidePopover = event.target.closest('.popover');

  // Si el clic ocurrió dentro del popover, no hacer nada
  if (clickedInsidePopover) {
    return;
  }

  // Si el clic ocurrió fuera del popover, cerrar todos los popovers
  closeAllPopovers();
});
</script>

<template>
    <div class="calendar-container">
        <div class="calendar-header flex w-full justify-between">
          <button @click="prevYear" class="border border-x-4 border-y-2 border-slate-400 mx-6">Previous Year</button>
          <button @click="prevMonth" class="border border-x-4 border-y-2 border-slate-400 mx-6">Previous Month</button>
          <span class="uppercase">{{ currentMonthName }} {{ currentYear }}</span>
          <button @click="nextMonth" class="border border-x-4 border-y-2 border-slate-400 mx-6">Next Month</button>
          <button @click="nextYear" class="border border-x-4 border-y-2 border-slate-400 mx-6">Next Year</button>
        </div>
        <table class="calendar-table">
          <thead>
            <tr>
              <th class="border px-4 py-2">Lunes</th>
              <th class="border px-4 py-2">Martes</th>
              <th class="border px-4 py-2">Miércoles</th>
              <th class="border px-4 py-2">Jueves</th>
              <th class="border px-4 py-2">Viernes</th>
              <th class="border px-4 py-2">Sábado</th>
              <th class="border px-4 py-2">Domingo</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="week in calendarWeeks" :key="week">
              <td v-for="day in week" :key="day" :class="['border', 'px-4', 'py-2', getDayClass(day), 'cursor-pointer', 'hover:bg-gray-200']">
                <div class="day-cell" @click="openPopover(day, $event)">
                  <div>{{ day }}</div>
                  <div v-if="popoverVisible[day]" class="popover" :style="{ top: `${popoverPosition.y}px`, left: `${popoverPosition.x}px` }">
                    <button @click="closePopover(day)" class="popover-close">Cerrar</button>
                    <div v-for="sesion in sortedSesiones" :key="sesion.id">
                      <table>
                        <tr>
                          <th>Inicio</th>
                          <th>Cierre</th>
                          <th>clases</th>
                          <th></th>
                        </tr>
                        <tr>
                          <td>{{ sesion.horainicio }}</td>
                          <td>{{ sesion.horacierre }}</td>
                          <td>algo</td>
                          <td>                      <Link
                        :href="route('sesion', {sesion: sesion.id})" 
                        class="w-1/12 text-blue-500">
                        Ver Sesion 
                      </Link></td>
                        </tr>

                      </table>
                      <div v-for="clase in sesion.clase">
                        {{ clase.title }}

                      </div>



                    </div>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>

      </div>
</template>

<style>
.calendar-container {
  width: 100%;
  overflow: auto;
}

.calendar-table {
  width: 100%;
}

.calendar-table th,
.calendar-table td {
  padding: 10px;
  text-align: center;
}

.calendar-table th {
  background-color: #f5f5f5;
}

.current-day {
  background-color: #f2f2f2;
}

.popover {
  position: absolute;
  padding: 10px;
  background-color: white;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
  z-index: 9999;
}

.popover-close {
  margin-bottom: 5px;
  color: #666;
  font-size: 12px;
  text-decoration: underline;
  cursor: pointer;
}
</style>