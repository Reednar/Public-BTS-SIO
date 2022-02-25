using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication1
{
    class Program
    {
        static void Main(string[] args)
        {
            List<Animal> LesAnimaux = new List<Animal>();
            Loup loup = new Loup(30,"noir"); 
            Chien chien = new Chien(20,"marron");
            Lion lion = new Lion(150,"orange");
            Tigre tigre = new Tigre(110,"orange et noir");
            Chat chat = new Chat(4,"noir et blanc");

            LesAnimaux.Add(loup);
            LesAnimaux.Add(chien);
            LesAnimaux.Add(lion);
            LesAnimaux.Add(tigre);
            LesAnimaux.Add(chat);

            Console.WriteLine("---------Liste des animaux---------");
            foreach(Animal a in LesAnimaux)
            {
                Console.WriteLine(a);
                a.deplacement();
                a.crier();
                Console.WriteLine("-----------------------");
            }
            Console.ReadKey();

        }
    }
}
