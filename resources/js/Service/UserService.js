import axios from 'axios';

const apiService = axios.create({
  baseURL: process.env.VUE_APP_API_BASE_URL, // Atur URL dasar sesuai kebutuhan Anda
  timeout: 10000, // Atur timeout sesuai kebutuhan Anda
});

export const fetchUserData = async (userId) => {
  try {
    const response = await apiService.get(`/user/${userId}`);
    return response.data;
  } catch (error) {
    console.error('Error fetching user data:', error);
    throw error;
  }
};

export const getUserDataWithValidation = async (userId) => {
  const data = await fetchUserData(userId);
  if (data.length > 0) {
    return data;
  } else {
    throw new Error('User data is empty');
  }
};
