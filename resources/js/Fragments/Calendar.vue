<template>
    <div class='demo-app'>
    
      <div class='demo-app-main'>
        <FullCalendar
          class='demo-app-calendar'
          :options='calendarOptions'
        >
          <template v-slot:eventContent='arg'>
            <b>{{ arg.timeText }}</b>
            <i>{{ arg.event.title }}</i>
          </template>
        </FullCalendar>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, watch } from 'vue'
  import FullCalendar from '@fullcalendar/vue3'
  import dayGridPlugin from '@fullcalendar/daygrid'
  import timeGridPlugin from '@fullcalendar/timegrid'
  import interactionPlugin from '@fullcalendar/interaction'
  import { INITIAL_EVENTS, createEventId } from '@/Service/Event-utils'
  
  const weekends = ref(true)
  const handleEventClick = (clickInfo) => {
    if (confirm(`Are you sure you want to delete the event '${clickInfo.event.title}'`)) {
      clickInfo.event.remove()
    }
  }

    
  const handleEvents = (events) => {
    currentEvents.value = events
  }
 
  
  watch(weekends, (newVal) => {
    calendarOptions.weekends = newVal
  })
  
  const handleWeekendsToggle = () => {
    weekends.value = !weekends.value
  }
  
  const handleDateSelect = (selectInfo) => {
    let title = prompt('Please enter a new title for your event')
    let calendarApi = selectInfo.view.calendar
  
    calendarApi.unselect()
  
    if (title) {
      calendarApi.addEvent({
        id: createEventId(),
        title,
        start: selectInfo.startStr,
        end: selectInfo.endStr,
        allDay: selectInfo.allDay
      })
    }
  }
  

  const calendarOptions = {
    plugins: [
      dayGridPlugin,
      timeGridPlugin,
      interactionPlugin
    ],
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    buttonText: {
    today: 'Hari Ini',
    month: 'Bulan',
    week: 'Minggu',
    day: 'Hari'
    },
    locale: 'id',
    initialView: 'dayGridMonth',
    initialEvents: INITIAL_EVENTS,
    editable: true,
    selectable: true,
    selectMirror: true,
    dayMaxEvents: true,
    weekends: weekends.value,
    select:handleDateSelect,
    eventClick: handleEventClick,
    eventsSet: handleEvents
  }
  
  const currentEvents = ref([])
  </script>
  
  <style lang='css'>
  /* Gaya CSS sama seperti sebelumnya */
  </style>
  