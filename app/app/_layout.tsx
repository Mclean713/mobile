import { Redirect, Slot, Stack} from "expo-router";
import { ThemeProvider } from "@/context/ThemeContext";
import "../global.css";
import { SessionProvider, useSession } from "@/context/AuthContext";
import { StatusBar } from "expo-status-bar";

  function Header(){
        const {session, isLoading} = useSession();

        if(session && !isLoading){
          return(
          <> 
              <StatusBar style="dark"/>
              <Redirect href= "/(app)" />
          </>
          )
        }
        return (
          <>
           <StatusBar style="dark"/>
          </>
          
        );
  }

export default function RootLayout() {
  return   <SessionProvider>
            <ThemeProvider>
                      <Header/>
                        <Slot/>
              </ThemeProvider>
 </SessionProvider>

 } 
 
