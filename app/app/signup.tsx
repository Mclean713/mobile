import axiosInstance from '@/config/axiosConfig';
import { useTheme } from "@/context/ThemeContext";
import React, { useState } from 'react';
import { View, Text, TextInput, TouchableOpacity, SafeAreaView, Image, Alert, ActivityIndicator } from 'react-native';
import { useSafeAreaInsets } from 'react-native-safe-area-context';
import axios from 'axios'; 
import Input from '../components/core/Input'

const SignupScreen = () => {
   const {currentTheme} = useTheme();

  const [data,setData] = useState({
    name: "",
    email: "",
    password: "",
    password_confirmation: ""
  });
  const [errors, setErrors] = useState({
    name: "",
    email: "",
    password: "",
    password_confirmation: ""
  });
  const [loading ,setLoading] = useState(false);
  const [successMasseges, setSuccessMassege] = useState('');


  const handleChange = (Key: string, value: string) =>{
      setData({...data, [Key]: value});
  }
 
  const handleSignup = async () =>{
     setLoading(true);

     setErrors({
        name: "",
        email: "",
        password: "",
        password_confirmation: ""
     })

     try{
         await axiosInstance.post('/api/register',data)
         handleResetForm();
         setSuccessMassege('Account created succefully!')
     }catch(error){
      if(axios.isAxiosError(error)){
        const reponseData = error.response?.data;

        if(reponseData?.errors){
          setErrors(reponseData.errors)
        }else if(reponseData?.message){
          Alert.alert('Error ',reponseData.message);
        }else{
          Alert.alert('Error occured')
        }
      }else{
         console.error('Error');
         Alert.alert('Error , Server') ;
        }
      
     }finally{
       setLoading(false);
     }

  }

  const handleResetForm = () =>{
       setData({
          name: "",
          email: "",
          password: "",
          password_confirmation: ""
       })
  }
  return (
    <View className={`flex-1 justify-center  p-2 ${currentTheme === 'dark' ? 'bg-color-900': 'by-gray-50'}`}>
     
 
        <View className="items-center mt-8 mb-12">
          <Text className={`text-3xl font-bold text-gray-800 ${currentTheme === 'dark' ? 'by-gray-50': 'bg-color-900'}`}>Bus Reservation</Text>
        </View>

        {!!successMasseges && <Text  className='bg-emerald-600  text-white rounded-lg py-6 px-4 mb-3'>
          {successMasseges}
        </Text>}

        <View className="space-y-4">
          <View>
            <Input
              placeholder="Name"
              value={data.name}
              onChangeText={(value)=> handleChange('name',value)}
              error={errors.name}
           />
          </View>

          <View>
             <Input
              placeholder="Email"
              value={data.email}
              keyboardType="email-address"
              onChangeText={(value) => handleChange('email',value)}
              error={errors.email}
           />
  
          </View>

          <View>

              <Input
              placeholder="Password"
              value={data.password}
              secureTextEntry
              onChangeText={(value) => handleChange('password',value)}
              error={errors.password}
    
           />
          </View>

          <View>
              <Input
              placeholder="Confirm your password"
              value={data.password_confirmation}
              secureTextEntry
              onChangeText={(value) => handleChange('password_confirmation',value)}
              error={errors.password}
    
           />
          </View>
        </View>

        <TouchableOpacity
          className="w-full h-12 bg-blue-600 rounded-lg justify-center items-center mt-8"
          onPress={handleSignup}
          disabled= {loading}
        >
          {loading && <ActivityIndicator size='small' color='#ffffff' className='mr-3'/>}
          <Text className="text-white font-semibold text-lg">Signup</Text>
        </TouchableOpacity>


        <View className="flex-row justify-center mt-6">
          <Text className="text-gray-600">Already have an account? </Text>
          <TouchableOpacity>
            <Text className="text-blue-600 font-medium">Sign in</Text>
          </TouchableOpacity>
        </View>
  
    </View>
  );
};

export default SignupScreen;