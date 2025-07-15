import { View, Text, TextInput, TouchableOpacity, Image, Alert, ActivityIndicator } from 'react-native';
import { SafeAreaView } from 'react-native-safe-area-context';
import React,  { useState } from 'react';
import Input from '../components/core/Input'
import { useSession } from '@/context/AuthContext';
import { Link, router } from 'expo-router';
import axios from 'axios';
import axiosInstance from '@/config/axiosConfig';
import { useTheme } from '@react-navigation/native';


const SignInScreen = () => {
   const {signIn} = useSession();
   const [loading ,setLoading] = useState(false);
   const [data, setData] = useState({
     email: "",
     password: ""
   });
   const [errors, setErrors] = useState({
     email: "",
     password: ""
   });
   const handleChange = (Key: string , value: string)=>{
      setData( {...data, [Key]:value});
      setErrors({...errors, [Key]: ""})
   }
   const handleLogin = async () => {
     setLoading(true);
     setErrors({ email: "", password: ""})

     try{
       const response = await axiosInstance.post('/api/login', data);
       await signIn(response.data.token, response.data.user)

       router.replace('/')
     }catch(error){
        if(axios.isAxiosError(error)){
        const reponseData = error.response?.data;

        if(reponseData?.errors){
          setErrors(reponseData.errors)
        }else if(reponseData?.message){
          Alert.alert('Error ',reponseData.message);
        }else{
          Alert.alert('Error occured')
        }}
        else{
            console.error('Error');
          Alert.alert('Error , Server') ;
        }         
       }finally{
         setLoading(false);
       }
              
     }
   

  return (
    <SafeAreaView className="flex-1 bg-white">
      <View className="flex-1 px-6 justify-center">
       
        <View className="items-center mb-12">
          
          <Text className="text-3xl font-bold text-gray-800">Login</Text>
        </View>


        <View className="space-y-4">

          <View>

            <Input
              placeholder="Enter your email"
              value={data.email}
              keyboardType="email-address"
              onChangeText={(value) => handleChange('email',value)}
              error={errors.email}
             />
          </View>

  
          <View>


            <Input 
              placeholder="Enter your password"
              value={data.password}
              onChangeText={(value) => handleChange('password',value)}
              secureTextEntry
              error={errors.password}     
            />
          </View>

    
          <TouchableOpacity
            className="w-full h-12 bg-blue-600 rounded-lg justify-center items-center mt-6"
            onPress={handleLogin}
          >
            <Text className="text-white font-semibold text-lg">Login</Text>
          </TouchableOpacity>
        </View>


        <View className="flex-row justify-center mt-8">
          <Text className="text-gray-600">Don't have an account? </Text>
          <TouchableOpacity>
            <Link href="/signup">
              {loading && <ActivityIndicator size='small' color='#ffffff' className='mr-3'/>}
               <Text className="text-blue-600 font-medium">Sign up</Text>
            </Link>   
          </TouchableOpacity>
        </View>
      </View>
    </SafeAreaView>
  );

};

export default SignInScreen;
