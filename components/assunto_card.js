function enrollClass(classId) {
  fetch(`services/enroll-class.php?classId=${classId}`).then(response => response.text()).then(console.log).catch(console.error);
}
